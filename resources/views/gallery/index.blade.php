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
          <div class="row">
            @foreach($galleries as $gallery)
              <div class="col-md-4 col-sm-6">
                <div class="card">
                  <a href="{{route('gallery.edit',['gallery'=>$gallery])}}">
                    <img src="{{asset($gallery->img_url)}}" alt="image" class="img-fluid" title="{{$gallery->img_url}}"> 
                  </a>
                </div>
              </div>
            @endforeach
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

