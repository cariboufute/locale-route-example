<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class ViewControllerTest extends TestCase
{
    public function setUp(): void
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

    public function testLocaleRouteWithTrailingWhere()
    {
        $response = $this->call('GET', 'fr/test3fr/1');
        $response->assertStatus(200);

        $response = $this->call('GET', 'en/test3en/1');
        $response->assertStatus(200);

        $response = $this->call('GET', 'en/test3en/4');
        $response->assertStatus(404);
    }
}
