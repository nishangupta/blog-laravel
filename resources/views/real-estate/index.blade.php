@extends('layouts.real-estate')

@section('content')
<div class="property-index">
  <div class="container">
    <div class="jumbotron">
      <div class="page-header">
        <h1 class="text-center display-4">Discover a place ,<br> You love to live</h1>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-10 mx-auto">
          <form action="{{route('property.show',['property'=>1])}}" method="GET">
            <div class="form-group d-flex ">
              <input type="text" placeholder="Search any property" class="form-control" name="propertyName">
              <input type="submit" class="btn btn-warning" value="Search">
            </div>
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
@endpush

