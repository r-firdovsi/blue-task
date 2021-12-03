<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        return response()->view('pages.employee.index');
    }

    public function list(): ResourceCollection
    {
        $employees = Employee::query()->latest()->paginate(8);
        return EmployeeResource::collection($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        $companies = Company::query()->latest()->get();
        return response()->view('pages.employee.form', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $employee = new Employee();
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');

        if ($request->has('company')) {
            $employee->company()->associate($request->input('company'));
        }

        if ($employee->save()) {
            return redirect()->route('employees.index')->with('success', __('main.success'));
        } else {
            return back()->with('error', __('main.error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id): Response
    {
        $employee = Employee::query()->findOrFail($id);
        $companies = Company::query()->latest()->get();
        return response()->view('pages.employee.form', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, int $id): RedirectResponse
    {
        $employee = Employee::query()->findOrFail($id);
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');

        if ($request->has('company')) {
            $employee->company()->dissociate();
            $employee->company()->associate($request->input('company'));
        }

        if ($employee->save()) {
            return redirect()->route('employees.index')->with('success', __('main.update'));
        } else {
            return back()->with('error', __('main.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id): RedirectResponse
    {
        $employee = Employee::query()->findOrFail($id);

        if ($employee->delete()) {
            return back()->with('success', __('main.deleted'));
        } else {
            return back()->with('error', __('main.error'));
        }
    }
}
