<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/articles', 'Api\ArticleController@index')->name('articles.index');

Route::get('/articles/latest/{quantity?}', 'Api\ArticleController@showLatest')
    ->name('articles.showLatest');

Route::get('/articles/{article:slug}', 'Api\ArticleController@show')->name('articles.show');

Route::put('/articles/{article:slug}/like', 'Api\ArticleLikeController')->name('articles.like.update');
Route::put('/articles/{article:slug}/view', 'Api\ArticleViewController')->name('articles.view.update');
Route::post('/articles/{article:slug}/comment', 'Api\ArticleCommentController')
    ->name('articles.comment.store');
