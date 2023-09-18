<?php

use App\Http\Controllers\Backoffice\AuthController;
use App\Http\Controllers\Backoffice\BillboardController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\OwnerController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Web\LandingPageController;
use Illuminate\Support\Facades\Route;

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

// Route Backoffice
Route::get('/dashboard'   , [DashboardController ::class, 'index'])->middleware('auth'                          )->name('dashboard'    );
Route::get('/manage-user' , [UserController      ::class, 'index'])->middleware('auth', 'role:super-admin|admin')->name('bo-user'      );
Route::get('/owners'      , [OwnerController     ::class, 'index'])->middleware('auth', 'role:super-admin|admin')->name('bo-owners'    );
Route::get('/billboards'  , [BillboardController ::class, 'index'])->middleware('auth', 'role:super-admin|admin')->name('bo-billboard' );
Route::get('/users'       , [UserController      ::class, 'index'])->middleware('auth', 'role:super-admin'      )->name('bo-users'     );
// end

Route::controller(LandingPageController::class)->group(function() {
    Route::get('/', 'index');
});

Route::get ('/login'         , [AuthController ::class, 'index'  ])->name('login'         );
Route::post('/login-process' , [AuthController ::class, 'login'  ])->name('login-process' );
Route::get ('/logout'        , [AuthController ::class, 'logout' ])->name('logout'        );
