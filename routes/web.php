<?php
Auth::routes();

Route::group(['middleware' => 'auth:web'], function() {
    Route::get('/', 'TransactionController@index')->name('home');
});