<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
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

Route::get('/', 'HomeController@index');


Route::group(['middleware'=>'auth'], function()
{
    
    Route::get('/show-blogs', 'HomeController@showBlogs');
    
    Route::get('/create-blog', 'HomeController@addBlogs');
    Route::post('/create-blog', 'HomeController@createBlogs');
    
    Route::get('/update-blog/{id}', 'HomeController@addBlogs');
    Route::post('/update-blog/{id}', 'HomeController@updateBlog');
    
    Route::get('/delete-blog/{id}', 'HomeController@deleteBlog');

    
    
    
    
    
    
    
});
Auth::routes();
Route::get('/{id}', 'HomeController@categoryBlogs');
Route::get('/show-blog-details/{id}', 'HomeController@showBlogDetails');

    
