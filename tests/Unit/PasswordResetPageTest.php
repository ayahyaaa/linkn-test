<?php

namespace Tests\Unit;

use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/password/reset');

        $response->assertStatus(200);
    }
}
