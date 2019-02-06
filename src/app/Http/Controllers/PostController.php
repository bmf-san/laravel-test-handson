<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Support;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('post.index', ['posts' => Post::latest()->get()]);
    }
    
    /**
     * Display the specified resource.
     * @param  int    $id
     * @return Renderable
     */
    public function show(int $id) 
    {
      return view('post.show');
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
      return view('post.create');
    }
    
    /**
     * Store a newly created resource in storage.
     * @param $request
     * @return Response
     */
    public function store(Request $request)
    {
      $post = new Post();
      $post->title = $request->title;
      $post->body = $request->body;    
      $post->user_id = Auth::id();
      $post->save();
      
      return redirect('/post');
    }
    
      /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return Renderable
     */
    public function edit(int $id)
    {
      return view('post.edit', ['post' => Post::findOrFail($id)]);
    }

    
    /**
     * Update the specified resource in storage.
     * @param  Request  $request
     * @param  int      $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
      $request->validate([
          'title' => 'required|max:10',
          'body' => 'required',
      ]);
      
      $post = Post::findOrFail($id);
      $post->title = $request->title;
      $post->body = $request->body;
      $post->user_id = Auth::id();
      $post->save();
      
      return redirect('/post');
    }
    
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Reponse
     */
    public function destroy(int $id)
    {
      Post::findOrFail($id)->delete();
      
      return redirect('/post');
    }
}
