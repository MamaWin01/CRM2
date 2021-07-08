<?php

namespace App\Http\Controllers\Admin\Companys;

use App\Models\Company;
use Illuminate\Pagination;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Companys\StoreCompanyRequest;
use App\Http\Requests\Companys\UpdateCompanyRequest;
use App\Http\Requests\Companys\UpdateProfileImageRequest;

class CompanysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.companys.index', ['companys' => Company::latest()->simplePaginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.companys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Company::create($request->only('name', 'email', 'website'));

        if ($request->hasFile('profile_image')) {
            $path = $request->profile_image->store('public/companys/profiles/images');
            $company->update(['profile_image' => $path]);
        }

        return redirect()->route('admin.companys.dashboard', $company->id)->with('success', 'Successfully Created a New company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return $company->load('employee');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('admin.companys.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        return back()->with('success', 'Successfully updated company details!');
    }

    public function updateProfileImage(UpdateProfileImageRequest $request, Company $company)
    {
        if ($company->profile_image) {
            Storage::delete($company->profile_image);
        }
        $path = $request->image->store('public/companys/profiles_images');

        $company->update(['profile_image' => $path]);

        return back()->with('success', 'Successfully updated profile image');
    }

    public function destroyProfileImage(Company $company)
    {
        if ($company->profile_image) {
            Storage::delete($company->profile_image);

            $company->update(['profile_image' => null]);
        }

        return back()->with('success', 'Successfully deleted profile image!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if ($company->profile_image) {
            Storage::delete($company->profile_image);
        }

        $company->delete();

        return redirect()->route('admin.companys.dashboard')->with('success', 'Successfully deleted company and all assets related to them.');
    }
}
