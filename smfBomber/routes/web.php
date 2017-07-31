<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/', 'Index@index');

Route::get('/', 'Index@index');

Route::post('/subscribe', 'Index@subscribe');

Route::get('/verify/{verification_code}', 'Index@verify');

Route::get('/password/reset/{token}', 'Index@reset');

Route::get('/date', 'Index@date');

Route::get('/home', 'System@system');

Route::get('/timezone', 'System@timezone');

Route::get('/language', 'System@language');

Route::post('/configuration', 'System@configuration');

Route::get('/profile', 'System@profile');

Route::post('/subirImagen', ['as'=>'fileImage','uses'=> 'System@subirImagen']);

Route::post('/actualizarImageProfile', 'System@actualizarImageProfile');

Route::post('/profile', 'System@saveProfile');

Route::get('/admin', 'System@admin');

Route::get('/adminTotals', 'System@adminTotals');

Route::get('/adminGetScopeTarget', 'System@adminGetScopeTarget');

Route::get('/mailsLauncher', 'MailsLauncher@mailsLauncher');

Route::get('/mailsTec', 'MailsTec@massiveInsertTecMails');

Route::post('/customMail', 'System@customMail');