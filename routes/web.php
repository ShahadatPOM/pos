<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.front.index');
});

Auth::routes();

Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth');
