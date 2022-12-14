<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',  [ LoginController::class, 'formLogin' ])->name('login');
Route::post('/login', [ LoginController::class, 'Login' ]);

Route::group( ['middleware' => ['auth'] ], function(){

    Route::get('/logout', [ LogoutController::class, 'Logout' ])->name('logout');
    
    Route::get('/user/add', [ UserController::class, 'create' ])->name('userAdd');

    Route::post('/user/add', [ UserController::class, 'store'])->name('storeUser');
    
    Route::get('/user/edit/{su_id}', [ UserController::class, 'edit'])->name('editUser');

    Route::get('/user/delete/{su_id}', [ UserController::class, 'delete'])->name('deleteUser');
});