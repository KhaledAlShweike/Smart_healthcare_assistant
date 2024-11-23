<?php

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
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    

});
