<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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



//retorna lista com todos os usuários
Route::middleware('auth') ->group(function (){
    Route::get('/users', [UserController::class, 'listAllUsers']) -> name('routeListAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUserByID']) ->name('routeListUser');
});

//forms para editar usuario por id
Route::get('/users/edit/id', [UserController::class, 'updateUser']) ->name('routeUpdateUser');

//deleta usuario
Route::get('/users/delete', [UserController::class, 'deleteUser']) ->name('routeDeleteUser');

Route::match(['get', 'post'], '/login', [AuthController::class, 'loginUser']) ->name('login');

Route::match(['get', 'post'], '/register', [UserController::class, 'createUser']) ->name('register');

Route::get('/logout', [AuthController::class, 'logoutUser']) ->name('logoutUser');

