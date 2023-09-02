<?php

use App\Http\Controllers\Backoffice\BillboardController;
use App\Http\Controllers\Backoffice\ImageController;
use App\Http\Controllers\Backoffice\OwnerController;
use App\Http\Controllers\Backoffice\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/users')->controller(UserController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});

Route::prefix('v1/owners')->controller(OwnerController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});

Route::prefix('v1/billboard')->controller(BillboardController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});

Route::prefix('v1/images')->controller(ImageController::class)->group(function() {
    Route::get('/', 'getAllData');
    Route::get('/{id}', 'getDataById');
    Route::post('/', 'upsertData');
    Route::delete('/{id}', 'deleteData');
});