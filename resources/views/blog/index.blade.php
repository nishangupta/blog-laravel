@extends('layouts.app')
@section('content')
  <div class="container">
    <p class="text-primary lead">Recent Blogs</p>
    <div class="row">
        @if(count($blogs)>0)
        @foreach($blogs as $blog)
          <div class="col-sm-12 col-md-6">
          <div class="card shadow p-4 pt-5">
            <a href="{{route('blog.show',['blog'=>$blog])}}" class="link text-dark">
              <h2 class="card-title font-weight-bold">{{$blog->title}}</h2>
            </a>
            <p class="text-muted">Last updated on <strong>{{$blog->updated_at}}</strong> by <strong>
              <span class="text-primary">{{$blog->user->name}}</span>
            </strong></p>
            <div class="card-body p-0">
              <p class="card-text">
                {{ $blog->summary }}
              </p>
            </div>
            <a href="{{route('blog.show',['blog'=>$blog])}}" class="link text-primary">Read more >></a>          
          </div>
        </div>
          @endforeach
        @else
        <div class="card p-4 pt-5">
          <h2 class="card-title font-weight-bold text-primary">No recent blogs.</h2>
        </div>
        @endif
    </div>
    <div class="d-flex justify-content-center pt-4">
      {{ $blogs->links() }}
    </div>
  </div>
@endsection