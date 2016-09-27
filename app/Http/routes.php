<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get(/**
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
    '/', function () {
    $data = 0;
    return view('input', ['status' => '0']);
});
Route::get('/getMessage', 'MessageController@getMessage');
Route::post('/postMessage', 'MessageController@postMessage');