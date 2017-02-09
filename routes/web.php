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

LocaleRoute::get('index', 'ViewController@index');

Route::get('/', function () {
    return redirect('/' . Config::get('app.fallback_locale'));
});

LocaleRoute::get('test2', 'ViewController@index', ['fr' => 'test2fr', 'en' => 'test2en']);

Route::get('testlocale', 'ViewController@testlocale');

Route::group(['prefix' => 'group'], function () {
    LocaleRoute::get('sub', 'ViewController@sub', ['fr' => 'sub_fr', 'en' => 'sub_en']);
});
