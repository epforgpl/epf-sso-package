<?php

Route::get('/epf-sso', 'EpfOrgPl\EpfSso\Http\Controller@index');

// These are specially namespaced routes normally obtained via 'Auth::routes();'
Route::group(['middleware' => ['web']], function () {
    Route::get('login', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@login');
    Route::post('logout', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@logout')->name('logout');

    // Registration routes.
    Route::get('register', 'EpfOrgPl\EpfSso\Http\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'EpfOrgPl\EpfSso\Http\Auth\RegisterController@register');

    // Password reset routes.
    Route::get('password/reset', 'EpfOrgPl\EpfSso\Http\Auth\ForgotPasswordController@showLinkRequestForm')
        ->name('password.request');
    Route::post('password/email', 'EpfOrgPl\EpfSso\Http\Auth\ForgotPasswordController@sendResetLinkEmail')
        ->name('password.email');
    Route::get('password/reset/{token}', 'EpfOrgPl\EpfSso\Http\Auth\ResetPasswordController@showResetForm')
        ->name('password.reset');
    Route::post('password/reset', 'EpfOrgPl\EpfSso\Http\Auth\ResetPasswordController@reset');
    Route::view('password/reset-success', 'epf-sso::auth.passwords.reset-success')->middleware('auth');

    // Password change routes.
    Route::view('password/change','epf-sso::auth.passwords.change')->name('password.change')->middleware('auth');
    Route::view('password/change-success','epf-sso::auth.passwords.change-success')->middleware('auth');
    Route::post('password/change','EpfOrgPl\EpfSso\Http\Auth\ChangePasswordController@changePassword')
        ->name('password.change.execute')
        ->middleware('auth');

    Route::view('/sso-home', 'epf-sso::home.home')->middleware('auth');
});
