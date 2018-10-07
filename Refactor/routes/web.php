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

Route::get('/v1/users', 'UserController@index');
Route::get('/v1/users/{id}', 'UserController@selecteduser');
Route::get('/v1/users/{id}/pets', 'UserController@userpets');
Route::post('/v1/users', 'UserController@userspost');
Route::delete('/v1/users/{id}/pets/{id}', 'PetsController@deletepets');
