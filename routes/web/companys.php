<?php

use GuzzleHttp\Promise\Create;
use App\Models\CompanyEmployee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Companys\CompanysController;
use App\Http\Controllers\Admin\Companys\CompanyEmployeesController;


Route::get('/', [CompanysController::class, 'index'])->name('dashboard');
Route::get('create', [CompanysController::class, 'create'])->name('create');
Route::get('{company}/edit', [CompanysController::class, 'edit'])->where('company', '[0-9]+')->name('edit');
Route::get('{company}', [CompanysController::class, 'show'])->where('company', '[0-9]+')->name('show');
Route::get('{company}/dashboard', [CompanysDashboardController::class, 'index'])->where('company', '[0-9]+')->name('company.dashboard');


Route::post('/', [CompanysController::class, 'store'])->name('store');
Route::put('{company}', [CompanysController::class, 'update'])->where('company', '[0-9]+')->name('update');
Route::put('{company}/profile-image', [CompanysController::class, 'updateProfileImage'])->where('company', '[0-9]+')->name('update.profile-image');
Route::delete('{company}', [CompanysController::class, 'destroy'])->where('company', '[0-9]+')->name('delete');
Route::delete('{company}/profile-image', [CompanysController::class, 'destroyProfileImage'])->where('company', '[0-9]+')->name('delete.profile-image');

// Route::get('employee', [CompanyEmployeesController::class, 'index'])->where('company', '[0-9]+')->name('employee.index');
// Route::get('employee/create', [CompanyEmployeesController::class, 'create'])->where('company', '[0-9]+')->name('employee.create');
// Route::post('employee', [CompanyEmployeesController::class, 'store'])->where('company', '[0-9]+')->name('employee.store');
// Route::put('employee', [CompanyEmployeesController::class, 'update'])->where('company', '[0-9]+')->name('employee.update');

