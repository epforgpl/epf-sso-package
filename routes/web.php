<?php

Route::get('/epf-sso', 'EpfOrgPl\EpfSso\Http\Controller@index');

// These are specially namespaced routes normally obtained via 'Auth::routes();'
Route::group(['middleware' => ['web']], function () {
    Route::get('login', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@login');
    Route::post('logout', 'EpfOrgPl\EpfSso\Http\Auth\LoginController@logout')->name('logout');

    /*
     * // TODO: Uncomment
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    */

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::view('password/change','epf-sso::auth.passwords.change')->name('password.change')->middleware('auth');
    Route::view('password/change-success','epf-sso::auth.passwords.change-success')->middleware('auth');
    Route::post('password/change','EpfOrgPl\EpfSso\Http\Auth\ChangePasswordController@changePassword')
        ->name('password.change.execute')
        ->middleware('auth');

    Route::view('/sso-home', 'epf-sso::home.home')->middleware('auth');
});

