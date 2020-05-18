@extends('layouts.app')
@section('content')
  <div class="cart-index">
    <div class="container">
    @include('inc.cart-nav')
      <div class="cart-section">
        <div class="row">
          <div class="col-md-4 col-sm-12">
              <img src="{{asset('img/product.jpg')}}" alt="product" class="img-fluid">
          </div>
          <div class="col-md-8 col-sm-12">
            <input type="hidden" value="{{$cart->id}}" name="product_id">
            <h4 class="card-title">{{$cart->title}}</h4>
            <p class="text-muted">{{$cart->category}}</p>
            <div class="d-flex my-2">
              <h2 class="text-danger">${{$cart->price}}</h2>
              <small class="text-muted text-crossed p-2"><del>40% off</del></small>
            </div>
            <p class="lead text-success d-block">Stock:@if($cart->stock === 1) Available @else Out-of-stock @endif</p>
            <div class="d-flex justify-content-between">
                <h5>Ratings:{{$cart->rating}}</h5>
              <div>
                <a class="btn btn-outline-dark" id="addToWishlist" ><i class="fas fa-heart"></i> Wishlist</a>
                <a class="btn btn-primary text-white" id="addToCartBtn" ><i class="fas fa-shopping-cart"></i> Add to cart</a>
              </div>
          </div>
        </div>
      </div>
      <div class="product-nav my-2">
        <div class="my-2 py-2">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-specifications-tab" data-toggle="pill" href="#pills-specifications" role="tab" aria-controls="pills-specifications" aria-selected="false">Specifications</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-ratings-tab" data-toggle="pill" href="#pills-ratings" role="tab" aria-controls="pills-ratings" aria-selected="false">Ratings</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
              <p class="pills-para">{{$cart->desc}} </p>
            </div>
            <div class="tab-pane fade" id="pills-specifications" role="tabpanel" aria-labelledby="pills-specifications-tab">
              Specifications
            </div>
            <div class="tab-pane fade" id="pills-ratings" role="tabpanel" aria-labelledby="pills-ratings-tab">
              Ratings
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
  $(document).ready(function(){
    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    //product id
    productId = $('input[name="product_id"]').val();

    $('#addToCartBtn').click(function(){
      if(confirm("Do you want to add this to your cart?")){
      $.ajax({
        url:'addToCart',
        method:'POST',
        dataType:'json',
        data:{cart:productId},
        success:function(data){
          alert(data.data);
        },
        error:function(err){
          console.log(err);
        }
      })
      }
    });

    //adding to the wish list
    $('#addToWishlist').click(function(){
      $.ajax({
        url:'addToWishlist',
        method:'POST',
        dataType:'json',
        data:{wish:productId},
        success:function(data){
            alert(data.data);
          },
          error:function(err){
            console.log(err);
          }
      });
    });
    
  })
</script>
@endpush






@push('css')
<style>
.cart-index{
  margin:2rem 0;
}
.cart-section{
  background-color:#FFFFFF;
  padding:2rem;
}
.pills-para{
  font-size:1rem;
  padding:2rem;
  background-color: #f5f5f5;
}
</style>
@endpush