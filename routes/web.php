<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.front.index');
});

Auth::routes();

// Dashboard
Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth');
