<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\PhoneVerifyController;
use App\Http\Controllers\Api\UpazilaController;
use App\Http\Controllers\Api\VaccineCenterController;
use App\Http\Controllers\Api\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/

Route::get('/test', function () {
    return 'Changed this text.';
});

Route::post('/verify', [VerificationController::class, 'verify']);
Route::get('/categoris', [CategoryController::class, 'index']);
Route::get('/divisions', [DivisionController::class, 'divisions']);
Route::get('/districts', [DistrictController::class, 'districts']);
Route::get('/upazilas',[UpazilaController::class, 'upazilas']);
Route::get('/vaccination-centers',[VaccineCenterController::class, 'vaccinationCenters']);

Route::post('/phone-verify',[PhoneVerifyController::class, 'phoneVerify']);
Route::post('/phone-verify-code',[PhoneVerifyController::class, 'phoneVerifyCode']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
