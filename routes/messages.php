<?php
	
Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
Route::get('/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@showAjax']);
Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@updateAjax']);




Route::get('/{id}/chat', ['as' => 'messages.getChat', 'uses' => 'MessagesController@getChat']);

/*Discarded*/
// Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
// Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
