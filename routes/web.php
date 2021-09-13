<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DivissionController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\VaccinationCenterController;
use App\Http\Controllers\VaccineController;

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/divisions', DivissionController::class);
    Route::post('/divisions-enable-disable{id}', [DivissionController::class, 'enableDisable'])->name('divisions-enable-disable');
    Route::resource('/people', PeopleController::class);
    Route::post('/people-edit{id}', [PeopleController::class, 'personEdit'])->name('people-edit');
    Route::resource('/vaccines', VaccineController::class);
    Route::resource('/vaccination-centers', VaccinationCenterController::class);
    Route::resource('/registrations', RegistrationController::class);
});

require __DIR__.'/auth.php';
