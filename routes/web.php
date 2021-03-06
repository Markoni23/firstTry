<?php

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

Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{id}', 'PostController@show');
Route::delete('posts/{id}', 'PostController@destroy');

Route::get('/posts/{postId}/comment', 'CommentController@create');
Route::post('/posts/{postId}/comment', 'CommentController@store');


Route::get('/posts/user/{id}', 'PostController@postsByAuthor');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
