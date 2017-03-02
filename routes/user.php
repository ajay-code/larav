<?php

/*User Profile*/
Route::get('/profile', 'User\UserController@profile');
Route::get('/profile/edit', 'User\UserController@editProfile');
Route::post('/profile/edit', 'User\UserController@changeProfile');
/*Change Password*/
Route::get('/password/change', 'User\PasswordController@change');
Route::post('/password/change', 'User\PasswordController@update');

/*Adding Product To The DataBase*/
Route::get('/addwish', 'User\ProductController@create');
Route::post('/addWish', 'User\ProductController@store');

/*Edit WishList*/
Route::get('wish/{product}/edit', 'User\ProductController@edit');
Route::post('wish/{product}/edit', 'User\ProductController@update');

/*Edit Product Photos*/
Route::post('wish/{product}/photos/', 'User\ProductController@addNewPhoto');
Route::delete('wish/photos/{photo}', 'User\ProductController@deletePhoto');
/*Set Primary Photo*/
Route::post('wish/primary/{product}', 'User\ProductController@setPrimaryImage');


/*Wish completed*/
Route::post('wish/{product}/completed', 'User\UserController@wishCompleted');

/*Showing All the User Wistlist of Products*/
Route::get('/wishlist', 'User\ProductController@index');

/* Bid on the Product */
Route::post('/products/{slug}/bid', 'User\UserController@makeBid');

/*Notification Url*/
Route::get('/notifications', 'User\UserController@showNotifications');
Route::get('/notifications/unread', 'User\UserController@showUnreadNotifications');



/*Test*/
Route::get('test/{product}', 'User\ProductController@test');
