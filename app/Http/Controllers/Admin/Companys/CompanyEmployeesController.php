<?php

namespace App\Http\Controllers\Admin\Companys;

use App\Models\Company;
use App\Models\CompanyEmployee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Companys\Employee\StoreEmployeeRequest;
use App\Http\Requests\Companys\Employee\UpdateEmployeeRequest;

class CompanyEmployeesController extends Controller
{
    public function create(Company $company)
    {
        return view('admin.companys.Employee.create', compact('company'));
    }

    public function store(StoreEmployeeRequest $request, Company $company)
    {
        $employee = CompanyEmployee::updateOrCreate(['company_id' => $company->id], $request->validated());

        return redirect()->route('admin.companys.dashboard', $company->id)->with('success', 'Successfully created a new Employee in Company!');
    }

    public function update(UpdateEmployeeRequest $request, Company $company)
    {
        $company->employee->update($request->validated());

        return redirect()->route('admin.companys.edit', $company->id)->with('success', 'Successfully updated company Employee details!');
    }
}
