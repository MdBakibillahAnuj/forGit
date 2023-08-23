<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FontControler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[FontControler::class,'viewBlog'])->name('view.blogf');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', [PageController::class, 'dashboard']);

    Route::get('/blog-view',[BlogController::class,'viewBlog'])->name('view.blog');
    Route::get('/blog-add',[BlogController::class,'addBlog'])->name('add.blog');
    Route::post('/blog-store',[BlogController::class,'storeBlog'])->name('store.blog');
    Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit.blog');
    Route::post('/update-blog/{id}',[BlogController::class,'updateBlog'])->name('update.blog');
    Route::get('/delete-blog/{id}',[BlogController::class,'deleteBlog'])->name('delete.blog');

});

