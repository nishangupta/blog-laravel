@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="my-4">
      <h2 class="text-center text-white p-4 bg-dark">Galler App</h2>
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
          </div>
          <div class="d-flex mt-2">
            <a class="btn btn-info" href="{{route('gallery.edit',['gallery'=>$gallery])}}">Edit</a>
            <form action="{{route('gallery.destroy',['gallery'=>$gallery])}}" method="POST" class="ml-auto">
              <button type="submit" class="btn btn-danger" >Delete</button>
              @method('delete')
              @csrf
            </form>
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

