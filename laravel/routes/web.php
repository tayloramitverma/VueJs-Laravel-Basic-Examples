<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/","BlogController@index");

Route::get("/add-blog","BlogController@create");

Route::post("/save_blog","BlogController@store");

Route::get("/view/{blog_id}","BlogController@show");

Route::get("/update/{blog_id}","BlogController@edit");

Route::post("/update_blog","BlogController@update");
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
