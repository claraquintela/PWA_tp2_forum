<?php

use App\Controllers\HomeController;

use App\Routes\Route;

use App\Controllers\CommentController;


Route::get('/home', 'HomeController@home');
Route::get('/', 'HomeController@home');

//User
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');
Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');


//Comment
Route::get('/comment', 'CommentController@index');
Route::get('/comment/show', 'CommentController@show');
Route::get('/comment/create', 'CommentController@create');
Route::post('/comment/create', 'CommentController@store');
Route::get('/comment/edit', 'CommentController@edit');
Route::post('/comment/edit', 'CommentController@update');
Route::post('/comment/delete', 'CommentController@delete');


//Forum 
Route::get('/forum', 'ForumController@index');
Route::get('/forum/create', 'ForumController@create');
Route::post('/forum/create', 'ForumController@store');
Route::get('/forum/show', 'ForumController@show');
Route::get('/forum/edit', 'ForumController@edit');
Route::post('/forum/edit', 'ForumController@update');
Route::post('/forum/delete', 'ForumController@delete');

//Dashboard
Route::get('/dashboard', 'DashboardController@index');

Route::dispatch();
