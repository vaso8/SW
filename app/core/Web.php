<?php

use App\Core\Route;

/**
 * Here we register routes. URL and ControllerName@methodName pairs.
 * 
 * The naming convention of URL is: No '/' symbol at start and end of the string.
 * Use {paramName} syntax to pass value throw URL
 * 
 */


Route::get('/goback',                          'ProductController@index');
Route::get('/',                          'ProductController@index');
Route::get('product/create',             'ProductController@create');
Route::get('product/update',             'ProductController@update');
Route::get('product/show/id',            'ProductController@show');
Route::get('product/show/{id}',          'ProductController@show');
Route::get('product/show/{name}/{lastname}',          'ProductController@show');
Route::get('product/show',               'ProductController@show');
Route::post('/create',                   'ProductController@postCreate');
Route::get('/create',                   'ProductController@postCreate');
Route::get('/create',                   'ProductController@postCreate');
