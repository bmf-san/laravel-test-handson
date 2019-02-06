<?php

use Tests\Feature;
use Tests\TestCase;
use App\User;

class AuthTest extends TestCase
{
    public function testApplication()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/');
    }
}