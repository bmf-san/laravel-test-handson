@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="/post/create" class="btn btn-primary align-right mb-2">Create</a>
        </div>
        <div class="col-md-8">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">body</th>
                <th scope="col">created at</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td><a href="/post/edit/{{ $post->id }}" class="btn btn-primary">Edit</a></td>
                    <td>
                      <form action="/post/delete/{{ $post->id }}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-primary">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
@endsection
