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

Route::get('/', 'BlogController@index')->name('index');
Route::get('/board/add','BlogController@add')->name('add');
Route::post('/board/check','BlogController@check')->name('check');
Route::post('/board/created','BlogController@created')->name('created');

Route::get('/', 'BlogController@index')->name('index');

Route::get('blog', 'BlogController@blog')->name('blog');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
