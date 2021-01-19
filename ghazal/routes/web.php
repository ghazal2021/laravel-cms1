<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminUserController;
use App\Http\Controllers\admin\adminCategoryController;
use App\Http\Controllers\admin\adminPostCategory;
use App\Http\Controllers\admin\adminPhotoController;
use App\Http\Controllers\users\userController;
use App\Http\Controllers\users\postControler;
use App\Http\Controllers\admin\adminCommentController;
use App\Http\Controllers\users\commentController;
use App\Http\Controllers\users\replyController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware'=>'admin'],function(){
    Route::resource('admin/users',adminUserController::class);
    Route::get('admin/actions/{id}',[adminUserController::class,'action'])->name('users.action');
    Route::resource('admin/categories',adminCategoryController::class);
    Route::resource('admin/posts',adminPostCategory::class);
    Route::get('admin/action/{id}',[adminPostCategory::class,'actions'])->name('posts.status');
    Route::resource('admin/photos',adminPhotoController::class);
    Route::resource('admin/comments',adminCommentController::class);
    Route::get('admin/comment/action/{id}',[adminCommentController::class,'actions'])->name('comment.action');
});


Route::get('/',[userController::class,'index']);
Route::get('posts/{slug}',[postControler::class,'show'])->name('users.posts.show');
Route::get('/search',[postControler::class,'search'])->name('users.posts.search');
Route::post('comments/{postId}',[commentController::class,'store'])->name('comments');
Route::post('reply/{commentId}',[replyController::class,'store'])->name('reply');
