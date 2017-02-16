<?php
	
Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
Route::get('/{id}/2', ['as' => 'messages.show2', 'uses' => 'MessagesController@show2']);
Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
