<?php
	
Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);


Route::get('/{id}/get/vue', ['as' => 'messages.getMessageAjax', 'uses' => 'MessagesController@getMessageAjax']);
Route::get('/{id}/vue', ['as' => 'messages.showAjax', 'uses' => 'MessagesController@showAjax']);
Route::put('{id}/vue', ['as' => 'messages.updateAjax', 'uses' => 'MessagesController@updateAjax']);
