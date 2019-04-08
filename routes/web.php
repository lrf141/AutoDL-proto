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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dataset', 'DatasetController@index')->name('dataset');
Route::get('/learn', 'LearnController@index')->name('learn');

Route::post('/learn/submit', 'LearnController@submit')->name('learn-submit');
Route::get('/learn/result', 'LearnController@result')->name('learn-result');

Route::get('/result', 'ResultController@index')->name('result');
Route::get('/result/{xid}', 'ResultController@detail')->name('result-detail');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
