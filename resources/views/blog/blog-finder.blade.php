@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="jumbotron">
      <h2 class="text-center">Related Blogs</h2>
    </div>
    <div class="container">
    <p class="lead text-primary">You searched for "{{request()->finder}}"</p>
      <div class="">
        @forelse ($blogs as $blog)
            <div class="card p-5 my-4 shadow">
                <h2>{{$blog->title}}</h2>
                <p class="lead">{{$blog->body}}</p>
            <small>{{$blog->created_at}}</small>
            </div>
        @empty
          <p class="display-4 p-5">No blogs found</p>
        @endforelse()
      </div>
      {{-- Preserving the url for Links Pagination --}}
    <div class="d-flex justify-content-center">{{$blogs->appends(request()->except('page'))->links()}}</div>
    </div>
  </div>
@endsection