<?php

Route::get('/epf-sso', 'EpfOrgPl\EpfSso\Http\Controller@index');

Auth::routes();
