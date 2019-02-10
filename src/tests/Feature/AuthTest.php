<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    
    public function testLogout()
    {
      $user = factory(User::class)->create();
    
      $this->actingAs($user)
            ->visit('/logout')
            ->seePageIs('/login');
    }
    
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