<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Resource routes for companies
Route::resource('companies', CompanyController::class);

// Resource routes for employees
Route::resource('employees', EmployeeController::class);

Route::get('locale/{lang}', [LocaleController::class,'setLocale']);