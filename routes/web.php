<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;


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

Route::get('/analyze', 'App\Http\Controllers\PagesController@analyze');

Route::get('login','App\Http\Controllers\TwitterController@login');
Route::get('callback','App\Http\Controllers\TwitterController@callback')->name('twitter.callback');

