<?php

namespace App\Http\Controllers;

use App\Http\Traits\FileUploadScopes;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    use FileUploadScopes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        return response()->view('company.index');
    }

    public function list(): JsonResponse
    {
        $companies = Company::query()->latest()->paginate(8);
        return response()->json($companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response()->view('company.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'weblink' => 'nullable|url',
            'logo' => 'nullable|file|mimes:jpg,jpeg,png'
        ]);

        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->weblink = $request->input('weblink');

        if ($request->hasFile('logo')) {
            $company->logo = $this->uploadFile($request->file('logo'), 'public/company/logos');
        }

        if ($company->save()) {
            return redirect()->route('companies.index')->with('success', __('main.success'));
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
        $company = Company::query()->findOrFail($id);
        return response()->view('company.form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'weblink' => 'nullable|string',
            'logo' => 'sometimes|file|mimes:jpg,jpeg,png'
        ]);

        $company = Company::query()->findOrFail($id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->weblink = $request->input('weblink');

        if ($request->hasFile('logo')) {
            $company->logo = $this->updateFile($request->file('logo'), $company->logo, 'public/company/logos');
        }

        if ($company->save()) {
            return redirect()->route('companies.index')->with('success', __('main.update'));
        } else {
            return back()->with('error', __('main.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $company = Company::query()->findOrFail($id);

        if ($company->delete()) {
            return back()->with('success', __('main.deleted'));
        } else {
            return back()->with('error', __('main.error'));
        }
    }
}
