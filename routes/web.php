<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.index');
});

// Profile
Route::get('/profile/{id}', 'ProfileController@profile')->middleware('auth')->name('user.profile');
Route::post('/profile/store/{id}', 'ProfileController@profileStore')->name('profile.store');
Route::post('/general/store', 'ProfileController@generalStore')->name('general.store');

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

// Variants
Route::group(['prefix' => 'variant', 'as' => 'variant.'], function() {
    Route::get('index', 'VariantController@index')->name('index');
    Route::get('create', 'VariantController@create')->name('create');
    Route::post('store', 'VariantController@store')->name('store');
    Route::get('edit/{id}', 'VariantController@edit')->name('edit');
    Route::post('update/{id}', 'VariantController@update')->name('update');
    Route::post('delete/{id}', 'VariantController@delete')->name('delete');
});

// Orders
Route::group(['prefix' => 'order', 'as' => 'order.'], function() {
    Route::get('orderPage', 'OrderController@orderPage')->name('orderPage');
    Route::get('orderList', 'OrderController@orderList')->name('list');
    Route::get('orderStore', 'OrderController@orderStore')->name('store');
    Route::get('order/edit/{id}', 'OrderController@orderEdit')->name('edit');
    Route::post('order/update/{id}', 'OrderController@orderUpdate')->name('update');
    Route::post('order/delete/{id}', 'OrderController@orderDelete')->name('delete');
});

//Cart
Route::post('food/add-to-cart', 'OrderController@addToCart')->name('add-to-cart');
Route::post('cart/item/remove', 'OrderController@cartItemRemove')->name('cart.itemRemove');
Route::post('cart/item/quantity/update', 'OrderController@itemQuantityUpdate')->name('item.quantityUpdate');