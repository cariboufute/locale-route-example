<?php

namespace Tests\Functional\Http\Controllers;

use App;
use Route;
use Session;
use Tests\TestCase;

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
        $response->assertStatus(200);
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', '/en');
        $response->assertStatus(200);
        $this->assertSame('en', App::getLocale());
    }

    public function testRoutesInBothLanguages()
    {
        $response = $this->call('GET', route('fr.index'));
        $response->assertStatus(200);
        $this->assertSame('fr', App::getLocale());

        $response = $this->call('GET', route('en.index'));
        $response->assertStatus(200);
        $this->assertSame('en', App::getLocale());
    }

    public function testSetLocaleMiddleware()
    {
        $response = $this->call('GET', route('fr.index'));
        $response->assertStatus(200);
        $this->assertSame('fr', App::getLocale());
        $this->assertSame('fr', session('locale'));

        $response = $this->call('GET', '/nolocale');
        $response->assertStatus(200);
        $this->assertSame('fr', App::getLocale());
        $this->assertSame('fr', session('locale'));

        $response = $this->call('GET', route('en.index'));
        $response->assertStatus(200);
        $this->assertSame('en', App::getLocale());
        $this->assertSame('en', session('locale'));

        $response = $this->call('GET', '/nolocale');
        $response->assertStatus(200);
        $this->assertSame('en', App::getLocale());
        $this->assertSame('en', session('locale'));
    }

    public function testLocaleRoute()
    {
        $response = $this->call('GET', locale_route('fr', 'en.index'));
        $response->assertStatus(200);
    }

    public function testLocaleRouteWithUrlArray()
    {
        $response = $this->call('GET', 'fr/test2fr');
        $response->assertStatus(200);

        $response = $this->call('GET', 'en/test2en');
        $response->assertStatus(200);
    }
}
