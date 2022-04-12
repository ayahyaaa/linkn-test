<?php
//Check Register Page Existence
namespace Tests\Unit;

use Tests\TestCase;

class RegisterPageTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
