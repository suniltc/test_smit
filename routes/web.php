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

Route::post('/add-note', 'HomeController@store')->name('add-note');
Route::get('/notes', 'HomeController@notes')->name('view-notes');
Route::get('/note/{slug}', 'HomeController@note')->name('view-note');

Route::post('comment/{slug}', 'HomeController@addComment')->name('add-comment');
Route::get('comments', 'HomeController@getComment')->name('get-comment');
