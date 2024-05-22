<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::get('/users/create', [UserController::class, 'createUser']) ->name('routeCreateUser');

//consulta usuário por id
Route::get('/users/ID', [UserController::class, 'listUserByID']) ->name('routeCreateUser');

//forms para editar usuario por id
Route::get('/users/id/edit', [UserController::class, 'createUser']) ->name('routeCreateUser');
