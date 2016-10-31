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

/*Route::get('/fr', 'ViewController@index');
Route::get('/en', 'ViewController@index');*/

LocaleRoute::get(
    [
        'fr' => 'locale',
        'en' => 'locale',
    ],
    [
        'as' => [
            'fr' => 'fr.locale',
            'en' => 'en.locale',
        ],
        'uses' => 'ViewController@locale',
    ]
);

LocaleRoute::getRoute('localeroute', 'ViewController@localeroute');

Route::get('testlocale', 'ViewController@test');
