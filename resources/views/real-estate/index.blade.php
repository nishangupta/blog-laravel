@extends('layouts.real-estate')

@section('content')
<div class="property-index">
  <div class="container-fluid">
    <div class="hero">
      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
          <div class="hero-caption">
            <div>
              <h2 class="caption-text">Discover a place <br> You love to live.</h2>
              <br>
              <form action="{{route('property.search')}}" method="GET">
                <div class="hero-search-bx">
                      <input type="text" placeholder="Naradevi, Kathmandu" class="navbar-search-input" autofocus>
                      <button type="button" class="hero-search-button">
                        <i class="fas fa-search"></i>
                      </button>
                </div>
              </form>
            </div>
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
<style>

</style>
@endpush

