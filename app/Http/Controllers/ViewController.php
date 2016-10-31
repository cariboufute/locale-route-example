<?php

namespace App\Http\Controllers;

use App;

class ViewController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function locale()
    {
        return App::getLocale();
    }

    public function localeRoute()
    {
        return App::getLocale() . '.localeroute';
    }
}
