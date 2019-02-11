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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dataset', 'DatasetController@index')->name('dataset');
Route::get('/learn', 'LearnController@index')->name('learn');

Route::post('/learn/submit', 'LearnController@submit')->name('learn-submit');
Route::get('/learn/result', 'LearnController@result')->name('learn-result');