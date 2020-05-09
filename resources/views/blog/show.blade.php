@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="card p-4 pt-5">
          <h2 class="card-title font-weight-bold">{{$blog->title}}</h2>
          <p class="text-muted">last updated on <strong>{{$blog->updated_at}} </strong>by <strong>
            <span class="text-primary">{{$blog->user->name}}</span></strong></p>
          <div class="card-body p-0">
            <p class="card-text">{{$blog->body}}</p>
          </div>
          <div class="card-footer my-5">
            <hr>
            <div class="shared-blog">
              <div class="shared-times">
                @if($blog->shared_times>0)
                  <h4>{{$blog->shared_times}}</h4>
                  <p class="text-muted">Shared</p>
                @else
                  <p>Share on </p>
                @endif
              </div>
              <div class="share-links">
                <a href="{{URL::current()}}"><i class="fab fa-facebook"></i></a>
                <a href="{{URL::current()}}"><i class="fab fa-twitter"></i></a>
                <a href="{{URL::current()}}"><i class="fab fa-google"></i></a>
                <a href="{{URL::current()}}"><i class="fab fa-linkedin"></i></a>
                <a href="{{URL::current()}}"><i class="fab fa-youtube"></i></a>
                <a href="{{URL::current()}}"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
            <hr>

            <div class="card-footer-top d-flex justify-content-between pt-5">
              <h2>Comment Section <i class="fas fa-message"></i></h2>
              <a href="#commentSection" class="btn btn-outline-dark">Leave a reply</a>
            </div>
            <hr>
            @if(count($blog->comments)>0)
              @foreach ($blog->comments as $comment)
              <div class="all-comments">
                <div class="bg-light">
                  <div class="user-comment-bx">
                    <div class="user-comment">
                      <img src="{{asset('img/download.png')}}" class="comment-user-thumbnail" alt="user">
                      <div class="user-details">
                        <h3 class="lead">{{$comment->name}}</h3>
                        <p class="text-muted">{{$comment->created_at}}</p>
                      </div>
                    </div>
                    <div class="comment-bx">
                        <p>{{$comment->comment}}</p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @else
              <p class="text-secondary">No comments yet.</p>
            @endif

            <hr>
            <div class="py-4 mt-5" id="commentSection">
              <h4 >Leave A Reply</h4>
              <p>Thanks for choosing to leave a comment. Please keep in mind that all comments are moderated according to our comment policy, and your email address will NOT be published. Please Do NOT use keywords in the name field. Let's have a personal and meaningful conversation.</p>
            </div>
            <div class="comment-form">
              <form action="{{route('blog.addComment',['blog'=>$blog])}}" method="POST">
                <div class="form-group">
                  @error('name') {{$message}} @enderror 
                  <input type="text" placeholder="Your name" name="name" class="form-control">
                </div>
                <div class="form-group">
                  @error('name') {{$message}} @enderror
                  <textarea type="text" name="comment" class="form-control" placeholder="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" >Submit Comment</button>
                @csrf
              </form>
            </div>
          </div>           
        </div>
      </div>
    </div>
  </div>
@endsection 