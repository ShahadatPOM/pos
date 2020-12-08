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
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
    Route::post('/update/{id}', 'CategoryController@update')->name('update');
    Route::post('/delete/{id}', 'CategoryController@destroy')->name('destroy');
});