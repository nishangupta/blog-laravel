@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6 mx-auto">
        <h2 class="display-4">Fill in all fields</h2>

        <form action="{{route('blog.update',['blog'=>$blog])}}" method="POST">
          <div class="form-group">
            <label for="">Title</label>
          <input type="text" name="title" class="form-control" value="{{$blog->title}}">
            @error('title')
            <div class="text-danger p-2">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Body</label>
            <textarea type="text" name="body" class="form-control">{{ $blog->body }}</textarea>
            @error('body')
             <div class="text-danger p-2">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-block btn-primary">Update Blog</button>
          @csrf
          @method('put')
        </form>

        <a href="{{route('profile')}}" class="my-4 btn btn-outline-primary">Go back</a>
      </div>
    </div>
  </div>
@endsection