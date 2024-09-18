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
    Route::get('/users', [UserController::class, 'listAllUsers']) -> name('listAllUsers');
    Route::get('/users/{uid}', [UserController::class, 'listUserByID']) ->name('routeListUser');
});

Route::get('/index', [UserController::class, 'index']) ->name('routeIndex');



Route::put('/users/{uid}/update', [UserController::class, 'updateUser']) ->name('routeUpdateUser');
Route::get('/users/{uid}/edit', [ UserController::class, 'editUser']) -> name('routeEditUser');
Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUser']) ->name('routeDeleteUser');
Route::match(['get', 'post'], '/login', [AuthController::class, 'loginUser']) ->name('login');
Route::match(['get', 'post'], '/register', [UserController::class, 'createUser']) ->name('register');
Route::get('/logout', [AuthController::class, 'logoutUser']) ->name('logoutUser');



Route::get('/create/topic', [TopicController::class, 'createTopic']) ->name('routeCreateTopic');


//Category
Route::get('/categories', [CategoryController::class , 'listAllCategories']) ->name('routeListCategories');
Route::match(['get', 'post'], '/categories/create', [CategoryController::class, 'createCategory']) ->name('routeCreateCategory');
Route::get('/categories/{cid}/edit', [CategoryController::class, 'editCategory']) -> name('routeEditCategory');
Route::delete('/categories/{cid}/delete', [CategoryController::class, 'deleteCategory']) ->name('routeDeleteCategory');

