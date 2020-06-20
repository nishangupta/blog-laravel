@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="my-4">
      <h2 class="text-center text-white p-4 bg-dark">Gallery App</h2>
      <div class="row">
        <div class="col-md-3 co-sm-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item list-group-item-action"><a href="{{URL::to('/gallery')}}" class="text-primary">Gallery</a></li>
            <li class="list-group-item list-group-item-action"><a href="{{URL::to('/gallery/create')}}" class="text-primary">Uploader</a></li>
          </ul>
        </div>
        <div class="col-md-9 col-sm-9">
           <div class="card">
             <img src="{{asset($gallery->img_url)}}" alt="image" class="img-fluid">
             <div class="card-body">
               <h2 class="card-header">{{$gallery->img_name}}</h2>
               <small>Created-by: <span class="text-primary text-capitalize">{{$gallery->user->name}}</span></small>
               <small>Created-at: <span class="text-info">{{$gallery->created_at}}</span></small>
             </div>
             <div class="card-body">
              <div class="heading d-flex justify-content-between">
              <h2 class="page-header">Gallery Editing</h2>
                <form action="{{route('gallery.destroy',['gallery'=>$gallery])}}" method="POST">
                  <button class="btn btn-danger" type="submit">Delete Post</button>
                  @csrf @method('delete')
                </form>
              </div> 
              <form action="{{route('gallery.update',['gallery'=>$gallery])}}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Image Title:</label>
                <input type="text" placeholder="Image Title" name="title" class="form-control" value="{{old('title') ?? $gallery->img_name }}">
                </div>
                <div class="form-group my-3">
                  <label for="">Image file:</label><br>
                  <input type="file" name="image"><br>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Submit</button>
                @csrf
                @method('patch')
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
@endpush

@push('css')
<style >
.list-group{
  list-style: none;
}
.list-group a{
  color:black !important;
  font-weight: bold;
}
.list-group a:hover{
    text-decoration:none;
  }
</style>
@endpush

