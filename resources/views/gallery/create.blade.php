@extends('layouts.app')
@section('content')
  <div class="container bg-secondary text-light">
    <div class="my-4">
      <h2 class="text-center text-white p-4 bg-dark">Create Gallery</h2>
      @if($errors->any())
      <div class="alert alert-info py-0 px-2">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <div class="row">
        <div class="col-md-6 mx-auto my-4">
          <form action="{{URL('/gallery')}}" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Image Title:</label>
              <input type="text" placeholder="Image Title" name="title" class="form-control">
            </div>
            <div class="form-group my-3">
              <label for="">Image file:</label><br>
              <input type="file" name="image"><br>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Submit</button>
            @csrf
          </form>   
          <div class="back-btn mt-5">
            <a href="{{URL::Previous()}}" class="btn btn-outline-light">Go back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>

</script>
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

