<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

LocaleRoute::get('index', 'ViewController@index');

Route::get('/', function () {
    return redirect('/' . Config::get('app.fallback_locale'));
});

LocaleRoute::get('test2', 'ViewController@index', ['fr' => 'test2fr', 'en' => 'test2en']);

Route::get('nolocale', ['as' => 'nolocale', 'uses' => 'ViewController@nolocale']);

Route::group(['prefix' => 'group'], function () {
    LocaleRoute::get('sub', 'ViewController@sub', ['fr' => 'sub_fr', 'en' => 'sub_en']);
});

LocaleRoute::get('test3', 'ViewController@test3', ['fr' => 'test3fr/{id}', 'en' => 'test3en/{id}'])->where(['id' => '[1-3]']);
