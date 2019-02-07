<?php

use App\User;

class ExampleTest extends TestCase
{
    public function testApplication()
    {
      $user = factory(User::class)->create();

      $this->visit('/login')  // FIXME visit is not exists in 5.7
           ->type($user->email, 'email')
           ->type('secret', 'password')
           ->press('ログイン')
           ->seePageIs('/home');
    }
}