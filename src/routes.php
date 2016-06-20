<?php

Route::group(['as' => 'api::', 'middleware' => ['api'], 'namespace' => 'Lembarek\Api\Controllers', 'prefix' => '/api/v1/'], function () {

    Route::get('/users', [
        'as' => 'show-users',
        'uses' => 'UsersController@index',
        ]);

    Route::get('/users/{user}', [
        'as' => 'show-user',
        'uses' => 'UsersController@show',
        ]);

    Route::post('/users', [
        'as' => 'create-user',
        'uses' => 'UsersController@store',
        ]);

    Route::put('/users/{id}', [
        'as' => 'update-user',
        'uses' => 'UsersController@update',
        ]);


    Route::delete('/users/{id}', [
        'as' => 'delete-user',
        'uses' => 'UsersController@destroy',
        ]);

});
