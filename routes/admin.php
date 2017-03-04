<?php

Route::get('/', 'Admin\AdminController@index');
Route::get('/home', 'Admin\AdminController@index')->name('home');
Route::get('/index', 'Admin\AdminController@index')->name('index');
Route::get('/categories', 'Admin\CategoryController@view')->name('category');
Route::get('/subcategories', 'Admin\SubCategoryController@view')->name('subcategory');
Route::get('/create', 'Admin\AdminController@create');

/*Routes For showing Products To admin*/
Route::get('/products', 'Admin\ProductController@index');
Route::get('/products/user/{user}', 'Admin\ProductController@showUsersProducts');
Route::get('/search', 'Admin\ProductController@search');

/*Ativating and Deactivating Products*/
Route::get('/products/{product}/deactivate', 'Admin\ProductController@deactivate');
Route::get('/products/{product}/activate', 'Admin\ProductController@activate');

/*Routes For Contact Info*/
Route::get('/contacts', 'Admin\ContactController@index');
Route::get('/contacts/{contact}', 'Admin\ContactController@show');


/*Routes For Contact Info*/
Route::get('/users', 'Admin\UserController@index');
Route::get('users/search', 'Admin\UserController@search');
