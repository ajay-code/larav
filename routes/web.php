<?php

/*Test route*/
Route::get('/test', 'HomeController@test');

/*Index Routes*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


/*
 *  Web Routes
 */

/*Product Display Routes*/
Route::get('/products', 'HomeController@showProducts');

Route::get('/category/{category}', 'HomeController@categoryProducts');

Route::get('/subcategory/{subcategory}', 'HomeController@subcategoryProducts');

Route::get('/tag/{tag}', 'HomeController@tagProducts');

/*Single Product Display*/
Route::get('/products/{slug}', 'HomeController@show');

/*Add Someone's Product To your own wishlist*/
Route::post('addtowishlist', 'HomeController@addProduct');

/*Routes For Contact Page*/
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'Admin\ContactController@store');





















/*
 *  User Login Routes
 */
Auth::routes();

/*Account verification*/
Route::get('register/confirm/{token}', 'Auth\ActivationController@confirmEmail');

/*Resend Account Email verification*/
Route::get('confirmation/resend', 'Auth\ActivationController@show');
Route::post('confirmation/resend', 'Auth\ActivationController@resend');


/*Social Login Routes*/
Route::get('/login/{service}', 'Auth\SocialLoginController@redirect');
Route::get('/login/{service}/callback', 'Auth\SocialLoginController@callback');





 /*
  *  Admin Login Routes
  */
 Route::group(['prefix' => 'admin'], function () {
   Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
   Route::post('/login', 'AdminAuth\LoginController@login');
   Route::post('/logout', 'AdminAuth\LoginController@logout');

   Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
   Route::post('/register', 'AdminAuth\RegisterController@register');

   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
 });




