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

Route::prefix('adherents')->group(function() {
    Route::get('/', 'AdherentsController@index')->name('adherents');
    
    Route::get('/show/{id}', 'AdherentsController@show')->name('adherentsShow');
    Route::get('/edit/{id}', 'AdherentsController@edit')->name('adherentsEdit');
    Route::get('/create', 'AdherentsController@create')->name('adherentsCreate');
    Route::post('/store', 'AdherentsController@store')->name('adherentsStore');
    Route::post('/update', 'AdherentsController@update')->name('adherentsUpdate');
    Route::get('/destroy/{id}', 'AdherentsController@destroy')->name('adherentsDestroy');
});
