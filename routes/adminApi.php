<?php

/*
 *  Category Api Routes
 */
Route::get('category', 'Admin\CategoryController@index');
Route::post('category/', 'Admin\CategoryController@store');
Route::patch('category/{category}', 'Admin\CategoryController@update');
Route::delete('category/{id}', 'Admin\CategoryController@destroy');

/*
 *  SubCategory Api Routes
 */
Route::get('subcategory', 'Admin\SubCategoryController@index');
Route::post('subcategory/', 'Admin\SubCategoryController@store');
Route::patch('subcategory/{subcategory}', 'Admin\SubCategoryController@update');
Route::delete('subcategory/{id}', 'Admin\SubCategoryController@destroy');


/*
 *  User Api Routes
 */
Route::get('user/{user}', 'Admin\UserController@show');
