<?php

use App\Core\Route;

/**
 * Here we register routes. URL and ControllerName@methodName pairs.
 * 
 * The naming convention of URL is: No '/' symbol at start and end of the string.
 * Use {paramName} syntax to pass value throw URL
 * 
 */


Route::get('/',                          'ProductController@index');
Route::get('product/create',             'ProductController@create');
Route::get('product/update',             'ProductController@update');
Route::get('product/show/id',            'ProductController@show');
Route::get('product/show/{id}',          'ProductController@show');
Route::get('product/show',               'ProductController@show');