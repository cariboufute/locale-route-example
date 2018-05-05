<?php

namespace App\Http\Controllers;

use App;

class ViewController extends Controller
{
    public function index()
    {
        return $this->indexPage();
    }

    protected function indexPage()
    {
        $sessionLocale = session('locale');
        return view('index', compact('sessionLocale'));
    }

    public function nolocale()
    {
        return $this->indexPage();
    }

    public function sub()
    {
        return 'sub_' . App::getLocale();
    }

    public function test3($id)
    {
        return 'test3_' . App::getLocale() . ', id: ' . $id;
    }
}
