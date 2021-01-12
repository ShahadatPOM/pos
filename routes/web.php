<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.index');
});

// Profile
Route::get('/profile/{id}', 'ProfileController@profile')->middleware('auth')->name('user.profile');
Route::post('/profile/store/{id}', 'ProfileController@profileStore')->name('profile.store');
Route::post('/general/store', 'ProfileController@generalStore')->name('general.store');

// user manage
Route::get('user/list', 'AdminController@allUsers')->name('all.user');
Route::get('user/create', 'AdminController@userCreate')->name('user.create');
Route::post('user/store', 'AdminController@userStore')->name('user.store');
Route::post('delete/{id}', 'AdminController@userDelete')->name('user.delete');


Auth::routes();

// Admin Dashboard
Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth');

// Food Category
Route::group(['prefix' => 'category', 'as' => 'category.'], function() {
    Route::get('index', 'CategoryController@index')->name('index');
    Route::get('create', 'CategoryController@create')->name('create');
    Route::post('store', 'CategoryController@store')->name('store');
    Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
    Route::post('update/{id}', 'CategoryController@update')->name('update');
    Route::post('delete/{id}', 'CategoryController@delete')->name('delete');
});

// Foods
Route::group(['prefix' => 'food', 'as' => 'food.'], function() {
    Route::get('index', 'FoodController@index')->name('index');
    Route::get('create', 'FoodController@create')->name('create');
    Route::post('store', 'FoodController@store')->name('store');
    Route::get('edit/{id}', 'FoodController@edit')->name('edit');
    Route::post('update/{id}', 'FoodController@update')->name('update');
    Route::post('delete/{id}', 'FoodController@delete')->name('delete');

    // food search
    Route::get('category/foodPage/{id}', 'OrderController@foodPage')->name('foodPage');
    Route::get('food/search/{text}', 'OrderController@foodSearch')->name('food-search');
    Route::post('category/food/all', 'OrderController@allFood')->name('allFoods');
    // Route::post('selectedFoods', 'OrderController@selectedFoods')->name('selectedFoods');
});

// Orders
Route::group(['prefix' => 'order', 'as' => 'order.'], function() {
    Route::get('orderPage', 'OrderController@orderPage')->name('orderPage');
    Route::get('all/list', 'OrderController@orderList')->name('list');
    Route::get('orderStore', 'OrderController@orderStore')->name('store');
    Route::get('order/detail/{id}', 'OrderController@orderDetails')->name('details');
    Route::get('order/edit/{id}', 'OrderController@orderEdit')->name('edit');
    Route::post('order/update/{id}', 'OrderController@orderUpdate')->name('update');
    Route::post('order/delete/{id}', 'OrderController@orderDelete')->name('delete');
    // orderItem
    Route::get('orderItem/edit/{id}', 'OrderController@orderItemEdit')->name('item.edit');
    Route::post('orderItem/update/{id}', 'OrderController@orderItemUpdate')->name('item.update');
    Route::post('orderItem/delete/{id}', 'OrderController@orderItemDelete')->name('item.delete');

    // status wise order list
    Route::get('pending/list', 'OrderController@pendingorderList')->name('pending.list');
    Route::get('complete/list', 'OrderController@completeorderList')->name('complete.list');
    Route::get('cancel/list', 'OrderController@cancelorderList')->name('cancel.list');

});

//Cart
Route::post('food/add-to-cart', 'OrderController@addToCart')->name('add-to-cart');
Route::post('cart/item/remove', 'OrderController@cartItemRemove')->name('cart.itemRemove');
Route::post('cart/item/quantity/update', 'OrderController@itemQuantityUpdate')->name('item.quantityUpdate');

// Reservation

Route::group(['prefix' => 'reservation', 'as' => 'reservation.'], function() {
    Route::get('index', 'ReservationController@index')->name('index');
    Route::get('create', 'ReservationController@create')->name('create');
    Route::post('store', 'ReservationController@store')->name('store');
    Route::get('edit/{id}', 'ReservationController@edit')->name('edit');
    Route::post('update/{id}', 'ReservationController@update')->name('update');
    Route::post('delete/{id}', 'ReservationController@delete')->name('delete');
});

// Report
Route::get('report', 'ReportController@report')->name('report');




