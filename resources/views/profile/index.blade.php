@extends('layouts.app')
@section('content')
<div class="container">
  <div class="jumbotron shadow">
  <h2 class="display-4 text-primary font-weight-bold">Welcome, {{auth()->user()->name}}</h2>
    <p class="lead">You can customize your posts here!</p>
  </div>
  <div class="user-blogs my-5">
    <div class="blog-create text-center"> 
      <h3 class="font-weight-bold">Create a new blog</h3>
      <a href="{{route('blog.create')}}" class="btn btn-primary">Create a new Blog</a>
    </div>
    
    <div class="blog-list mt-5">
      <h5 class="font-weight-bold">Your recent Blogs</h5>
      <table class="table table-striped table-hover">
        <thead class="table-dark bg-dark">
          <tr>
            <th>Name of Blog</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($blogs)>0)
            @foreach($blogs as $blog)
              <tr>
                <td><a href="{{route('blog.show',['blog'=>$blog])}}" class="text-primary link text-capitalize">{{$blog->title}}</a></td>
                <td>{{$blog->created_at}}</td>
                <td>{{$blog->updated_at}}</td>
                <td>
                  <div class="d-flex justify-content-center">
                    <a href="{{route('blog.edit',['blog'=>$blog])}}" class="btn btn-outline-primary mx-2">Update</a>
                    <form action="{{route('blog.destroy',['blog'=>$blog])}}" method="Post">
                      <button type="submit" class="btn btn-outline-danger">Delete</button>
                      @method('delete')
                      @csrf
                    </form>
                  </div>
                </td>
              </tr>
              @endforeach
          @else
              <p class="lead text-muted alert alert-danger">No Blogs</p>
          @endif
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{$blogs->links()}}
      </div>
    </div>
  </div>
</div>
@endsection