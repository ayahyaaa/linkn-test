<?php
//Check Login Page Existence
namespace Tests\Unit;

use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
