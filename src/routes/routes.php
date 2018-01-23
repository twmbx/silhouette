<?php

Route::get('/profile', 'App\Http\Controllers\Auth\ProfileController@viewUserProfile')->name('profile.view');
Route::post('/profile', 'App\Http\Controllers\Auth\ProfileController@editUserProfile')->name('profile.edit');