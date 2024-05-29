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

Route::get('/', function () {
    return view('welcome');
});

//retorna lista com todos os usuários
Route::get('/users', [UserController::class, 'listAllUsers']) -> name('routeListAllUsers');

//form para criar um usuário
Route::post('/users/create', [UserController::class, 'createUser']) ->name('routeCreateUser');

//consulta usuário por id
Route::get('/users/{uid}', [UserController::class, 'listUserByID']) ->name('routeListUser');

//forms para editar usuario por id
Route::put('/users/edit/id', [UserController::class, 'updateUser']) ->name('routeUpdateUser');

//delete usuario
Route::get('/users/delete', [UserController::class, 'deleteUser']) ->name('routeDeleteUser');

Route::match(['get', 'post'], '/login', [AuthController::class, 'loginUser']) ->name('login');

