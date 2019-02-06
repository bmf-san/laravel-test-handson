@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form method="POST" action="/post/store">
              @csrf

              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                  <div class="col-md-6">
                      <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                      @if ($errors->has('title'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
                  
              <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">Body</label>
                  
                  <div class="col-md-6">
                      <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body" required>{{ old('body') }}</textarea>
                      @if ($errors->has('body'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('body') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                        Submit
                      </button>
                  </div>
              </div>
          </form>
        </div>
    </div>
</div>
@endsection
