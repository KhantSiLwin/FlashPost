<?php

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Comment;

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

Route::controller(PageController::class)->group(function(){
    Route::get("/","index")->name("index");
    Route::get("/article-detail/{slug}","show")->name("detail");
    Route::get("/categories/{slug}","categorized")->name('categorized');

});

Route::resource("comment",CommentController::class)->only(["store","update","destroy"])->middleware("auth");

Auth::routes([
    // "register"=> false,
    // "login"=>false
]);

Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::resource("article",ArticleController::class);
    Route::resource("category",CategoryController::class);
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/user-list', [HomeController::class, 'users'])->name('user-list')->middleware('can:admin-only');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/user/{url_name}', [ProfileController::class, 'detail'])->name('user.detail');
    Route::post('/user-change_role', [ProfileController::class, 'changeRole'])->name('user.changeRole');

});


