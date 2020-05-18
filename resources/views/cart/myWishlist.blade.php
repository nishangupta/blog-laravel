@extends('layouts.app')

@section('content')
  <div class="cart-index">
    <div class="container">
    @include('inc.cart-nav')
      <div class="pre-checkout-cart">
        <div class="card shadow">
          <div class="card-header d-flex justify-content-between">
            <h2 class="card-title">Favourate Product ({{count($userWishlist)}} items)</h2>
            <div class="">
              <a href="{{route('cart.myCart')}}" class="btn btn-primary">Checkout</a>
            </div>
          </div>
          <div class="card-body">
            <div class="teble-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th class="table-first-col">Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($userWishlist as $item)
                  <tr class="cart-checkout-row">
                    <td>
                      <img src="{{asset('img/product.jpg')}}" class="table-cart-img" alt="img">
                    </td>
                    <td class="table-first-col">
                      <p class="lead">{{$item->favourites}}</p>
                      <a removeProduct class="text-danger">Remove</a>
                    </td>
                    <td>
                      <div class="quantity-selector">
                        <button class="btn btn-outline-secondary substract-cart" substract-cart>-</button>
                        <input type="number" class="quantity-input" min="1" value="1">
                        <button class="btn btn-outline-secondary " add-cart>+</button>
                      </div>
                    </td>
                    <td class="product_id_key d-none">{{$item->favourites}}</td>

                    <td class="cart-row-price">
                      {{-- ${{$item->favourites->price}} --}}
                    </td>
                  </tr>
                  @endforeach
                  <tr class="bg-light table-total-row">
                    <td></td>
                    <td class="text-right table-first-row">Total</td>
                    <td id="cart-items"></td>
                    <td id="cart-total-price"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <div class="card-footer-checkout">
              <div></div>
                <div class="d-flex">
                  <input type="text" placeholder="coupon" class="form-control">
                  <button class="btn btn-secondary">Apply</button>
                  <a href="#" class="btn btn-primary mx-2" >Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
$(function(){
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  //remove product
  $('[removeProduct]').click(function(){
    let product_id = $(this).parents('.cart-checkout-row').find('.product_id_key').text();
    $.ajax({
      url:'removeFromCart',
      method:'GET',
      data:{cart:product_id},
      success:function(res){
        alert(res.data)
        window.location.reload();
      },
      error:function(err){
        console.log(err.data)
      }
    });
  })


  let cartPricesList = [];
  $('.cart-checkout-row').each(function(){
    let x = {
      id: parseInt($(this).find('td.product_id_key').text()),
      val: parseFloat($(this).find('.cart-row-price').text().replace('$',''))
    }
    cartPricesList.push(x)
  })
  
  //demo
  $('#cart-items').text($('.cart-checkout-row').length + " (items)"); 

  getTotalPrice()
  //demo

  $('[add-cart]').click(function(){
    $(this).parent().find('.quantity-input').val(
      parseInt($(this).parent().find('.quantity-input').val()) + 1
      );

    $(this).parents('.cart-checkout-row').find('.cart-row-price').text('$'+
      $(this).parent().find('.quantity-input').val() * 
      cartPricesList.find(cart => cart.id == $(this).parents('.cart-checkout-row').find('.product_id_key').text()).val
    )
    getTotalPrice()
  });
  
  $('[substract-cart]').click(function(){
    if($(this).parent().find('.quantity-input').val() < 2) return
    $(this).parent().find('.quantity-input').val(
      parseInt($(this).parent().find('.quantity-input').val()) - 1
      );
    
    $(this).parents('.cart-checkout-row').find('.cart-row-price').text('$'+
      $(this).parent().find('.quantity-input').val() * 
      cartPricesList.find(cart => cart.id == $(this).parents('.cart-checkout-row').find('.product_id_key').text()).val
    )
    getTotalPrice()
  });
  
  function getTotalPrice(){
    let sum = 0;
    $('.cart-checkout-row').each(function(){
      sum += parseFloat(  $(this).find('.cart-row-price').text().replace('$','') )
    })
    
    $('#cart-total-price').text('$'+sum);
  }

});
</script>
@endpush

@push('css')
<style>
a{
  cursor:pointer;
}
.cart-row-price{
  font-size:1.3rem;
}

.cart-index{
  margin:2rem 0;
}
.table-first-col{
  width:70%;
}
.table-total-row td{ 
  font-size:1.3rem;
}
.card-footer-checkout{
  display: flex;
  justify-content: space-between;
}
.table-cart-img{
  height:4rem;
  overflow: hidden;
}
.quantity-selector{
  display:flex;
}
.quantity-selector .quantity-input{
  width:2.5rem;
  height:auto;
  padding:5px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@endpush