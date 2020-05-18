@extends('layouts.app')
@section('content')
  <div class="cart-index">
    <div class="container">
    @include('inc.cart-nav')
      <div class="cart-section">
        <div class="row">
          @foreach($carts as $cart)
            <div class="col-md-4 col-sm-6">
              <div class="card shadow">
                <img src="{{asset('img/product.jpg')}}" alt="product" class="card-img-top">
                <div class="card-body">
                  <a href="{{route('cart.show',['cart'=>$cart])}}"><h3 class="card-title text-dark">{{$cart->title}}</h3></a>
                  <p class="text-muted">{{$cart->category}}</p>
                  <div class="d-flex my-2">
                    <h2 class="text-danger">${{$cart->price}}</h2>
                    <small class="text-muted text-crossed">40% off</small>
                  </div>
                  <p class="lead text-success d-block">Stock:@if($cart->stock === 1) Available @else Out-of-stock @endif</p>
                  <div class="d-flex justify-content-between">
                    <div>
                      <h5>Ratings:{{$cart->rating}}</h5>
                    </div>
                    <div>
                      <span class="product_id d-none" >{{$cart->id}}</span>
                      <button type="button" class="btn btn-outline-dark addToWishlist"><i class="fas fa-heart"></i></button>
                      <button type="button" class="btn btn-primary addToCartBtn"><i class="fas fa-shopping-cart"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="pagination d-flex justify-content-center">
          {{$carts->links()}}
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

  $('.addToCartBtn').click(function(){
    productId = $(this).parent().find("span.product_id").text();
    if(confirm("Do you want to add this to your cart?")){
      $.ajax({
        url:'cart/addToCart',
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
    $('.addToWishlist').click(function(){
      productId = $(this).parent().find("span.product_id").text();
        $.ajax({
          url:'cart/addToWishlist',
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
/* .cart-section{
  background-color:#FFFFFF;
  padding:2rem;
}
.card{
  margin-bottom:2rem;
}
   */
  
</style>
@endpush