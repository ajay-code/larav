<?php

/*Adding Product To The DataBase*/
Route::get('/addwish', 'User\ProductController@create');
Route::post('/addWish', 'User\ProductController@store');

/*Edit WishList*/
Route::get('wish/{product}/edit', 'User\ProductController@edit');


/*Showing All the User Wistlist of Products*/
Route::get('/wishlist', 'User\ProductController@index');


/*Notification Url*/
Route::get('/notifications', 'User\UserController@showNotifications');
Route::get('/notifications/{notification}', 'User\UserController@showSingleNotification');



