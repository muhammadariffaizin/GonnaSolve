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

Route::get('/', 'QuestionController@index')->name('index');
Route::get('/answers', 'AnswerController@index')->name('answers');
Route::post('/createQuestion', 'QuestionController@create')->name('createQuestion');
Route::get('/question/{id}', 'QuestionController@showDetail')->name('showDetail');
Route::post('/createAnswer', 'AnswerController@create')->name('createAnswer');
Route::get('/editProfile', 'ModalController@loadModal')->name('editProfile');
Route::post('/updateProfile', 'ModalController@update')->name('updateProfile');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
