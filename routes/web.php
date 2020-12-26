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

// Foods
Route::group(['prefix' => 'food', 'as' => 'food.'], function() {
    Route::get('/index', 'FoodController@index')->name('index');
    Route::post('/show', 'FoodController@show')->name('show');
    Route::get('/create', 'FoodController@create')->name('create');
    Route::post('/store', 'FoodController@store')->name('store');
    Route::get('/edit/{id}', 'FoodController@edit')->name('edit');
    Route::post('/update/{id}', 'FoodController@update')->name('update');
    Route::post('/delete', 'FoodController@destroy')->name('destroy');
});