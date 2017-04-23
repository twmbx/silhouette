<?php

Route::get('/profile', 'App\Http\Controllers\Auth\ProfileController@viewUserProfile')->name('profile');
Route::post('/profile', 'App\Http\Controllers\Auth\ProfileController@editUserProfile')->name('edit-profile');