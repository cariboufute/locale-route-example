<?php

namespace App\Http\Controllers;

use App;
use CaribouFute\LocaleRoute\Session\Locale as SessionLocale;

class ViewController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function locale(SessionLocale $locale)
    {
        $locale->set('fr');

        return App::getLocale();
    }
}
