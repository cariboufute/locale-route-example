<?php

namespace App\Http\Controllers;

use App;

class ViewController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function testlocale()
    {
        return App::getLocale();
    }
}
