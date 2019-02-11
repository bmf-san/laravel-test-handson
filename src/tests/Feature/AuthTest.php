<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class AuthTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testLogin()
    {
      $user = factory(User::class)->create();

      $this->visit('/login')
           ->type($user->email, 'email')
           ->type('secret', 'password')
           ->press('Login')
           ->seePageIs('/home');
    }
    
    public function testRegister()
    {
      $this->visit('/register')
           ->type('test', 'name')
           ->type('test@example.com', 'email')
           ->type('password', 'password')
           ->type('password', 'password_confirmation')
           ->press('Register')
           ->seePageIs('/home');
    }
}