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

Auth::routes();

/*
|--------------------------------------------------------------------------
| User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/blog/input', 'BlogPostController@input')->name('blog_post_input');
    Route::post('/blog/input', 'BlogPostController@inputConfirm');
    Route::post('/blog/input/complete', 'BlogPostController@inputComplete')->name('blog_post_input_complete');
    Route::get('/blog/{id}', 'BlogPostController@show')->name('blog_post_show');
});