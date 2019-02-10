<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    
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
    
    public function logout()
{
    // ユーザーを１つ作成
    $user = factory(User::class)->create();

    // 認証済み、つまりログイン済みしたことにする
    $this->actingAs($user);

    // 認証されていることを確認
    $this->assertTrue(Auth::check());

    // ログアウトを実行
    $response = $this->post('logout');

    // 認証されていない
    $this->assertFalse(Auth::check());

    // Welcomeページにリダイレクトすることを確認
    $response->assertRedirect('/');
}
}