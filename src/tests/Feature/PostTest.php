<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Post;

class PostTest extends TestCase
{
    use DatabaseMigrations;
  
    public function testCreatePost()
    {
      $user = factory(User::class)->create();
      
      $this->actingAs($user);
      $this->visit("/post/create");
      $this->type("title", "title");
      $this->type("body", "body");
      $this->press("Submit");
      $this->seePageIs("/post");
    }
    
    public function testEditPost()
    {
      $user = factory(User::class)->create();
      $post = factory(Post::class)->create(["user_id" => $user]);
      
      $this->actingAs($user);
      $this->visit("/post/edit/{$user->posts->first()->id}");
      $this->type("title", "title");
      $this->type("body", "body");
      $this->press("Submit");
      $this->seePageIs("/post");
    }
    
    public function testDeletePost()
    {
      $user = factory(User::class)->create();
      $post = factory(Post::class)->create(["user_id" => $user]);
      
      $this->actingAs($user);
      $this->visit("/post");
      $this->press('Delete');
      $this->seePageIs("/post");
    }
}
