<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('register', [PatientController::class, 'register']);
Route::delete('patients/{id}', [PatientController::class, 'delete']);
Route::put('patientss/{id}', [PatientController::class, 'update']);
Route::post('login', [PatientController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [PatientController::class, 'logout']);
/////////////////////DOCTOR////////////////////////////////
Route::post('doctor/register', [DoctorController::class, 'register']);



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    

});
