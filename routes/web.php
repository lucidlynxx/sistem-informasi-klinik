<?php

use App\Http\Controllers\ActionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::resource('/dashboard/users', UserController::class)->except(['show', 'destroy']);
    Route::resource('/dashboard/regions', RegionController::class)->except(['show', 'destroy']);
    Route::resource('/dashboard/employees', EmployeeController::class)->except(['destroy']);
    Route::resource('/dashboard/medicines', MedicineController::class)->except(['show', 'destroy']);
    Route::resource('/dashboard/actions', ActionController::class)->except(['show', 'destroy']);

    Route::resource('/dashboard/patients', PatientController::class)->except(['destroy']);
    Route::resource('/dashboard/registrations', RegistrationController::class);
    Route::resource('/dashboard/medicalrecords', MedicalRecordController::class)->except(['destroy']);
    Route::resource('/dashboard/payments', PaymentController::class)->only(['index', 'update']);

    Route::get('/dashboard/payments/{payment:slug}', [PaymentController::class, 'printPayment'])->name('payments.print');
    Route::get('/dashboard/searchregions', [RegionController::class, 'searchRegions'])->name('regions.search');
    Route::get('/dashboard/searchpatients', [PatientController::class, 'searchPatients'])->name('patients.search');
    Route::get('/dashboard/searchregistrations', [RegistrationController::class, 'searchRegistrations'])->name('registrations.search');
    Route::get('/dashboard/searchactions', [ActionController::class, 'searchActions'])->name('actions.search');
    Route::get('/dashboard/searchmedicines', [MedicineController::class, 'searchMedicines'])->name('medicines.search');

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});
