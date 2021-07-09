<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Companys\CompanyEmployeesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('employee', [CompanyEmployeesController::class, 'index'])->where('employee', '[0-9]+')->name('employee.index');
Route::get('employee/create', [CompanyEmployeesController::class, 'create'])->where('employee', '[0-9]+')->name('employee.create');
Route::post('employee', [CompanyEmployeesController::class, 'store'])->where('employee', '[0-9]+')->name('employee.store');
Route::get('employee/{employee}/edit', [CompanyEmployeesController::class, 'edit'])->where('employee', '[0-9]+')->name('employee.edit');
Route::put('employee', [CompanyEmployeesController::class, 'update'])->where('employee', '[0-9]+')->name('employee.update');

Route::prefix('companys')->middleware('auth')->name('admin.companys.')->group(base_path('routes/web/companys.php'));

