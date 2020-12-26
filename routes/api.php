<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function(){
   Route::get('/home', 'api\UserController@index');
   Route::get('show/with/subcategory/{id}', 'api\UserController@show_with_subcategory');
   Route::get('show/{id}', 'api\UserController@show');
   Route::post('comment', 'api\UserController@comment');
   Route::post('reply/comment', 'api\UserController@reply_comment');
});


Route::middleware('guest:api')->group(function(){
    Route::get('/', 'api\GuestController@index');
    Route::get('show/with/subcategory/{id}', 'api\GuestController@show_with_subcategory');
    Route::get('show/{id}', 'api\GuestController@show');
    Route::post('register', 'api\UserController@register');
    Route::post('login', 'api\UserController@login');
});

