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
LocaleRoute::get('test2', 'ViewController@index', ['fr' => 'test2fr', 'en' => 'test2en']);

Route::get('testlocale', 'ViewController@test');
