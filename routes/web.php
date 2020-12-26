<?php

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/home', 'AdminController@index');
    Route::name('admin')->prefix('admin')->group(function(){
        Route::get('create', 'AdminController@create_category')->name('CreateCategory');
        Route::post('append', 'AdminController@append_category')->name('AppendCategory');
        Route::get('add/subcategory/{id}', 'AdminController@create_subcategory')->name('CreateSubcategory');
        Route::post('save/subcategory', "AdminController@append_subcategory") -> name('AppendSubcategory');
        Route::get('choice/cetegory', "AdminController@choice_category") -> name('ChoiceCategory');
        Route::get('choice/subcategory/{id}', 'AdminController@Choice_subcategory') -> name('ChoiceSubcategory');
        Route::get('crate/post/{id}', 'AdminController@create_post') -> name('CreatePost');
        Route::post('save/post', 'AdminController@save_post') -> name('SavePost');
    });
});

Route::middleware(['auth'])->group(function(){
    Route::name('user')->prefix('user')->group(function(){
        Route::get('home', 'UserController@index')->name('home');
        Route::get('show/{id}', "UserController@show")->name('show');
        Route::post('comment', "UserController@comment")->name('Comment');
        Route::post('reply/comment', 'UserController@comment_reply')->name('CommentReply');
        Route::get('show/with/categories/{id}', "UserController@show_with_category")->name('ShowWithCategories');
        Route::get('show/with/subcategory/{id}', "UserController@show_with_subcategory")->name('ShowWithSubcategories');
    });
});

Route::middleware(['guest'])->group(function(){
    Route::get('/', 'GuestController@index')->name('home');
    Route::name('guest')->prefix('guest')->group(function(){
        Route::get('show/{id}', 'GuestController@show')->name('Show');
        Route::get('show/with/categories/{id}', 'GuestController@show_with_category')->name('ShowWithCategories');
        Route::get('show/with/subcategory/{id}', 'GuestController@show_with_subcategory')->name('ShowWithSubcategory');
    });
});
Route::get('sing-in/google', 'auth\LoginController@google')->name('loginGoogle');
Route::get('sing-in/google/redirect', 'auth\LoginController@redirect_google');
Route::get('sing-in/facebook', 'auth\LoginController@facebook')->name('loginFacebook');
Route::get('sing-in/facebook/redirect', 'auth\LoginController@redirect_facebook');