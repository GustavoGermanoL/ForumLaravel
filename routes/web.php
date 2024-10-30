<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
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

//Users

Route::put('/users/{uid}/update', [UserController::class, 'updateUser']) ->name('routeUpdateUser');
Route::get('/users/{uid}/edit', [ UserController::class, 'editUser']) -> name('routeEditUser');
Route::delete('/users/{uid}/delete', [UserController::class, 'deleteUser']) ->name('routeDeleteUser');
Route::match(['get', 'post'], '/login', [AuthController::class, 'loginUser']) ->name('login');
Route::match(['get', 'post'], '/register', [UserController::class, 'createUser']) ->name('register');
Route::get('/logout', [AuthController::class, 'logoutUser']) ->name('logoutUser');


//Topic
Route::group(['prefix' => 'topics'], function(){
Route::get('/topics', [TopicController::class , 'index']) ->name('routeListTopic');
Route::match(['get', 'post'], '/create', [TopicController::class, 'createTopic']) ->name('routeCreateTopic');
Route::get('/{cid}/edit', [TopicController::class, 'editTopic']) -> name('routeEditTopic');
Route::put('/{cid}/update', [TopicController::class, 'updateTopic']) ->name('routeUpdateTopic');
Route::delete('{cid}/delete', [TopicController::class, 'deleteTopic']) ->name('routeDeleteTopic');
Route::get('/{cid}', [TopicController::class, 'listTopicByID']) ->name('routeListTopic');
});

//Category
Route::get('/categories', [CategoryController::class , 'listAllCategories']) ->name('routeListCategories');
Route::match(['get', 'post'], '/categories/create', [CategoryController::class, 'createCategory']) ->name('routeCreateCategory');
Route::get('/categories/{cid}/edit', [CategoryController::class, 'editCategory']) -> name('routeEditCategory');
Route::put('/categories/{cid}/update', [CategoryController::class, 'updateCategory']) ->name('routeUpdateCategory');
Route::delete('/categories/{cid}/delete', [CategoryController::class, 'deleteCategory']) ->name('routeDeleteCategory');
Route::get('/categories/{cid}', [CategoryController::class, 'listCategoryByID']) ->name('routeListCategory');



//Tag
Route::get('/tags', [TagController::class , 'listAllTags']) ->name('routeListTags');
Route::match(['get', 'post'], '/tags/create', [TagController::class, 'createTag']) ->name('routeCreateTag');
Route::get('/tags/{tid}/edit', [TagController::class, 'editTag']) -> name('routeEditTag');
Route::put('/tags/{tid}/update', [TagController::class, 'updateTag']) ->name('routeUpdateTag');
Route::delete('/tags/{tid}/delete', [TagController::class, 'deleteTag']) ->name('routeDeleteTag');
Route::get('/tags/{tid}', [TagController::class, 'listTagByID']) ->name('routeListTag');