<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.index');
});

Auth::routes();

// Admin Dashboard
Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth');

// Food Category

Route::group(['prefix' => 'category', 'as' => 'category.'], function() {
    Route::get('/', 'CategoryController@index')->name('index');
    Route::post('/show', 'CategoryController@show')->name('show');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::post('/edit', 'CategoryController@edit')->name('edit');
    Route::post('/update/{id}', 'CategoryController@update')->name('update');
    Route::post('/delete', 'CategoryController@destroy')->name('destroy');
});