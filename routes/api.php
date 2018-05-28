<?php
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@apiLogin');
Route::get('logout', 'Auth\LoginController@apiLogout');

Route::group(['middleware' => 'auth:api'], function() {
    /*Transactions Endpoints*/
    Route::get('transactions/{customerId}/{id}', 'TransactionController@show');
    Route::get('transactions/filters/{customerId}/{amount}/{date}/{offset}/{limit}', 'TransactionController@filters');
    Route::post('transactions', 'TransactionController@add');
    Route::put('transactions/{id}', 'TransactionController@update');
    Route::delete('transactions/{id}', 'TransactionController@delete');
    /*Customers Endpoints*/
    Route::post('customers', 'CustomerController@add');
});
