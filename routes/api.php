<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PictureController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OptionController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Api\UploadController;

use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('permissions', PermissionController::class);
    Route::resource('pictures', PictureController::class);
    Route::resource('properties', PropertyController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('options', OptionController::class);
    Route::resource('users', UserController::class);

    Route::delete('/properties/{id}', [PropertyController::class, 'destroy']);
    Route::put('/properties/{id}', [PropertyController::class, 'update']);
    Route::put('/users/{id}', [UserController::class, 'update']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('upload', [UploadController::class, 'upload']);




