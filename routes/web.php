<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
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


Route::get('/', [UserController::class , 'dashboardViewUser']);
Route::get('/fullpost/{id}', [UserController::class , 'fullPost']);

Route::post('savecomment',[UserController::class , 'saveComment']);

Route::get('/admin',[AdminController::class , 'dashboardView']);
Route::get('/admin/comments',[AdminController::class , 'allComments']);

Route::get('admin/addpost', function(){
    return view("admin.addnewpost");
});

Route::post('savepost',[AdminController::class , 'savePost']);
Route::get('editpost/{id}',[AdminController::class , 'getEditItem']);
Route::get('deleteitem/{id}',[AdminController::class , 'deletePost']);

Route::get('deletecomment/{id}',[AdminController::class , 'deleteComment']);

Route::get('allitem/{id}',[AdminController::class , 'getAllItem']);
Route::post('savedititem',[AdminController::class , 'editItem']);

Route::post('search',[AdminController::class , 'searchItem']);