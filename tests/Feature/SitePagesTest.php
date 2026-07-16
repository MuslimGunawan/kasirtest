<?php

namespace Tests\Feature;

use Tests\TestCase;

class SitePagesTest extends TestCase
{
    public function test_public_pages_return_successful_response(): void
    {
        $this->get('/')->assertOk();
        $this->get('/fitur')->assertOk();
        $this->get('/tentang')->assertOk();
        $this->get('/kontak')->assertOk();
        $this->get('/panduan')->assertOk();
        $this->get('/faq')->assertOk();
    }
}
