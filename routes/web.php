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

Route::get('/', [
    'uses' => 'BookingsController@create'
]);

Route::post('/', [
    'uses' => 'BookingsController@store',
    'as' => 'store'
]);

Route::get('/dashboard', [
    'uses' => 'BookingsController@find'
]);

Route::post('/dashboard', [
    'uses' => 'BookingsController@filter',
    'as' => 'filter'
]);