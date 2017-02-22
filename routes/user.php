<?php

/*Adding Product To The DataBase*/
Route::get('/addwish', 'User\ProductController@create');
Route::post('/addWish', 'User\ProductController@store');

/*Edit WishList*/
Route::get('wish/{product}/edit', 'User\ProductController@edit');
Route::post('wish/{product}/edit', 'User\ProductController@update');


/*Wish completed*/
Route::post('wish/{product}/completed', 'User\UserController@wishCompleted');

/*Showing All the User Wistlist of Products*/
Route::get('/wishlist', 'User\ProductController@index');

/* Bid on the Product */
Route::post('/products/{slug}/bid', 'User\UserController@makeBid');

/*Notification Url*/
Route::get('/notifications', 'User\UserController@showNotifications');
Route::get('/notifications/{notification}', 'User\UserController@showSingleNotification');



/*Test*/
Route::get('test/{product}', 'User\ProductController@test');
