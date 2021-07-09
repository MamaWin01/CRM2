<?php

namespace App\Http\Controllers\Admin\Companys;

use App\Models\Company;
use App\Models\CompanyEmployee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Companys\Employee\StoreEmployeeRequest;
use App\Http\Requests\Companys\Employee\UpdateEmployeeRequest;
use App\Models\Employee;

class CompanyEmployeesController extends Controller
{
    public function index(Company $company,Employee $employee)
    {
        $employee = Employee::all();
        return view('admin.companys.employee.index', compact('company', 'employee'));
    }

    // public function show(Company $company)
    // {
    //     $company = Company::where('company_id', $company)->first();
    //     return view('admin.companys.employee.index')->with($company);
    //     // return $company->load('admin');
    // }

    public function create(Company $company, Employee $employee)
    {
        return view('admin.companys.Employee.create', compact('company', 'employee'));
    }

    public function store(StoreEmployeeRequest $request, Company $company, Employee $employee)
    {
        // $validated = $request->validate([
        //     'first_name'=> 'required',
        //     'last_name'=> 'required',
        //     'company'=> 'required|digits:6|numeric',
        //     'email'=> 'required',
        //     'phone'=> 'required'
        // ]);

        // Employee::create([
        //     'first_name'=> $request->first_name,
        //     'last_name'=> $request->last_name,
        //     'company'=> $request->company,
        //     'email'=> $request->email,
        //     'phone'=> $request->phone
        // ]);

        // return redirect()->route('employee.index')->with('success', 'Successfully created a new Employee in Company!');

        $employee = Employee::create($request->only('first_name', 'last_name','company', 'email', 'phone'));
        // $company = Company::create($company->id, $request->validated());

        return redirect()->route('employee.index', $employee->id)->with('success', 'Successfully created a new Employee in Company!');
    }

    public function update(UpdateEmployeeRequest $request, Company $company)
    {
        $company->employee->update($request->validated());

        return redirect()->route('admin.companys.employee.index', $company->id)->with('success', 'Successfully updated company Employee details!');
    }
}
