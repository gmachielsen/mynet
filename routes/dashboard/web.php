<?php

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'role:super_admin|admin'])->group(function() {
    Route::get('/', 'WelcomeController@index')->name('welcome');

    //category routes
    Route::resource('categories', 'CategoryController')->except(['show']);

    // role index
    Route::resource('roles', 'RoleController')->except(['show']);
});
