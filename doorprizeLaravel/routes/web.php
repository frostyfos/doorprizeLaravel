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

Route::get('/', 'GeneratorController@index');

Route::resource('participant', 'ParticipantController');
Route::resource('prize', 'PrizeController');

Route::get('/generator', 'GeneratorController@index');
Route::post('/generator/generate', 'GeneratorController@generator');

Route::get('/result', 'PrizeResultController@index');
Route::get('/result/export', 'PrizeResultController@export');