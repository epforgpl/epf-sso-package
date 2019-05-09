<?php

Route::get('/epf-sso', 'EpfOrgPl\EpfSso\Http\Controller@index');

// These are specially namespaced routes normally obtained via 'Auth::routes();'
Route::get('login', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@login');
Route::post('logout', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@logout')->name('logout');

/*
 * // TODO: Uncomment
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/
