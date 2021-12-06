<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Traits\FileUploadScopes;
use App\Mail\NewCompanyMail;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        return response()->view('pages.company.index');
    }

    public function list(): ResourceCollection
    {
        $companies = Company::query()->latest()->paginate($this->perPage);
        return CompanyResource::collection($companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Response
    {
        return response()->view('pages.company.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request): RedirectResponse
    {
        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->weblink = $request->input('weblink');

        if ($request->hasFile('logo')) {
            $company->logo = $this->uploadFile($request->file('logo'), 'public/company/logos');
        }

        if ($company->save()) {
            $details = [
                'title' => 'Mail from Blue Planet',
                'body' => 'Company ' . $company->name . ' registered'
            ];

            Mail::to('your_receiver_email@gmail.com')->send(new NewCompanyMail($details));

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
    public function show(int $id): JsonResponse
    {
        $company = Company::query()->findOrFail($id);
        return response()->json($company);
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
        return response()->view('pages.company.form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CompanyRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, int $id): RedirectResponse
    {
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

        if ($company->logo) {
            Storage::delete('public/company/logos/' . $company->logo);
        }

        if ($company->delete()) {
            return redirect()->route('companies.index')->with('success', __('main.deleted'));
        } else {
            return back()->with('error', __('main.error'));
        }
    }
}
