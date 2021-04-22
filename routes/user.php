<?php

Route::get('/user/view/profile','User\UserController@UserViewProfile')->name('user_view_profile');

Route::get('/user/edit/view/{id}','User\UserController@UserEditView')->name('user_edit_view');

Route::POST('/update/user/{id}','User\UserController@UpdateUser')->name('update_user');

Route::get('/user/view/package','User\UserController@UserViewPackage')->name('user_view_package');

