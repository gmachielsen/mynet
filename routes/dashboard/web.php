<?php

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'role:super_admin|admin'])->group(function() {
    Route::get('/', 'WelcomeController@index')->name('welcome');

    //category routes
    Route::resource('categories', 'CategoryController')->except(['show']);

    Route::resource('movies', 'MovieController')->except(['show']);
    // role index
    Route::resource('roles', 'RoleController')->except(['show']);

    // users indes
    Route::resource('users', 'UserController');

    Route::get('/settings/social_login', 'SettingController@social_login')->name('settings.social_login');
    Route::get('/settings/social_links', 'SettingController@social_links')->name('settings.social_links');
    Route::post('/settings', 'SettingController@store')->name('settings.store');
});
