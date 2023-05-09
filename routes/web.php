<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//projects of the authenticated user
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/project',[ProjectController::class,'create'])->name('project.create');
Route::post('/project',[ProjectController::class,'store'])->name('project.store');
Route::get('/project/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
Route::post('/project/update/{id}',[ProjectController::class,'update'])->name('project.update');
Route::get('/project/delete/{id}',[ProjectController::class,'delete'])->name('project.delete');

//Assign task for the projects
Route::post('/task',[TaskController::class,'store'])->name('task.store');
Route::get('/task',[TaskController::class,'index'])->name('task.index'); //this is create
Route::get('/task/edit/{id}',[TaskController::class,'edit'])->name('project.edit');
Route::post('/task/update/{id}',[TaskController::class,'update'])->name('project.update');
Route::get('/task/delete/{id}',[TaskController::class,'delete'])->name('project.delete');

//Assign Comments for the tasks

Route::get('/comment/{task_id}',[CommentController::class,'create'])->name('comment.create');
Route::post('/comment',[CommentController::class,'store'])->name('comment.store');
Route::get('/comment/edit/{id}',[CommentController::class,'edit'])->name('comment.edit');
Route::post('/comment/update/{id}',[CommentController::class,'update'])->name('comment.update');
Route::get('/comment/delete/{id}',[CommentController::class,'delete'])->name('comment.delete');
Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add');
