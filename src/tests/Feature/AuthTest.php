<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthTest extends TestCase
{
    public function testApplication()
    {
      $user = factory(User::class)->create();

      $this->visit('/login')
           ->type($user->email, 'email')
           ->type('secret', 'password')
           ->press('Login')
           ->seePageIs('/home');
    }
}