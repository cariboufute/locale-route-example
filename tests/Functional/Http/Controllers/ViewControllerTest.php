<?php

namespace Tests\Functional\Http\Controllers;

use App;
use Route;
use Session;
use TestCase;

class ViewControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Session::start();
    }

    public function testPagesInBothLanguages()
    {
        $response = $this->call('GET', '/fr');
        $this->assertResponseOk();
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', '/en');
        $this->assertResponseOk();
        $this->assertSame('en', App::getLocale());
    }

    public function testRoutesInBothLanguages()
    {
        $response = $this->call('GET', route('fr.index'));
        $this->assertResponseOk();
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', route('en.index'));
        $this->assertResponseOk();
        $this->assertSame('en', App::getLocale());
    }

    public function testSetLocaleMiddleware()
    {
        $response = $this->call('GET', route('fr.index'));
        $this->assertResponseOk();
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', '/testlocale');
        $this->assertResponseOk();
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', route('en.index'));
        $this->assertResponseOk();
        $this->assertSame('en', App::getLocale());

        $response = $this->call('GET', '/testlocale');
        $this->assertResponseOk();
        $this->assertSame('en', App::getLocale());
    }

    public function testLocaleRoute()
    {
        $response = $this->call('GET', locale_route('fr', 'en.index'));
        $this->assertResponseOk();
    }
}
