<?php

namespace Tests\Functional\Http\Controllers;

use App;
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
        $response = $this->call('GET', '/fr/locale');
        $this->assertResponseOk();
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', '/en/locale');
        $this->assertResponseOk();
        $this->assertSame('en', App::getLocale());
    }

    public function testRoutesInBothLanguages()
    {
        $response = $this->call('GET', route('fr.localeroute'));
        $this->assertResponseOk();
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', route('en.localeroute'));
        $this->assertResponseOk();
        $this->assertSame('en', App::getLocale());
    }

    public function testSetLocaleMiddleware()
    {
        $response = $this->call('GET', route('fr.localeroute'));
        $this->assertResponseOk();
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', '/testlocale');
        $this->assertResponseOk();
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', route('en.localeroute'));
        $this->assertResponseOk();
        $this->assertSame('en', App::getLocale());

        $response = $this->call('GET', '/testlocale');
        $this->assertResponseOk();
        $this->assertSame('en', App::getLocale());
    }
}
