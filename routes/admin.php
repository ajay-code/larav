<?php

Route::get('/', 'Admin\AdminController@index');
Route::get('/home', 'Admin\AdminController@index')->name('home');
Route::get('/index', 'Admin\AdminController@index')->name('index');
Route::get('/category', 'Admin\CategoryController@view')->name('category');
Route::get('/subcategory', 'Admin\SubCategoryController@view')->name('subcategory');
Route::get('/create', 'Admin\AdminController@create');

/*Routes For Contact Info*/
Route::get('/contact', 'Admin\ContactController@index');
Route::get('/contact/{contact}', 'Admin\ContactController@show');


/*Routes For Contact Info*/
Route::get('/user', 'Admin\UserController@index');


