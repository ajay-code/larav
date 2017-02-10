<?php

/*Adding Product To The DataBase*/
Route::get('/addwish', 'User\ProductController@create');
Route::post('/addWish', 'User\ProductController@store');


/*Showing All the User Wistlist of Products*/
Route::get('/wishlist', 'User\ProductController@index');
