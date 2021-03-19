<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/front/articles', function(){
    return view('articles',[
        'articles'=> Article::all()
    ]);
})->middleware('auth')->name('articles.front');
Route::get('/articles/read/{article}', function(Article $article){
    return view('article_read',[
        'article'=> $article
    ]);
})->middleware('auth')->name('articles.read');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('isAllowedArticles')->name('home');
Route::resource('articles',ArticleController::class);
Route::resource('users',UserController::class);
