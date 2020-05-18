<?php

namespace App\Http\Controllers;

use App\Cart;
use App\UserCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    public function index()
    {
        $carts = Cart::latest()->paginate(4);
        return view('cart.index')->with('carts', $carts);
    }
    public function show(Cart $cart)
    {
        return view('cart.show')->with('cart', $cart);
    }

    //myCart
    public function myCart()
    {
        $userCarts = auth()->user()->userCarts;
        $userCarts = $userCarts->where('wishlist', null);
        return view('cart.myCart')->with('userCarts', $userCarts);
    }

    //post request through url
    public function addToCart(Request $request)
    {
        $cart = $request->cart;
        $dbCart = auth()->user()->userCarts;
        foreach ($dbCart as $item) {
            if ($cart == $item->cart_product) {
                return response()->json(['data' => 'This product is already added! You can change the order quantity.']);
            }
        }
        $userCart = new UserCart;
        $userCart->user_id = auth()->user()->id;
        $userCart->cart_product = $cart;
        if ($userCart->save()) {
            return response()->json(['data' => 'Product added to cart']);
        } else {
            return false;
        }
    }
    //post request through url
    public function addToWishlist(Request $request)
    {
        $cart = $request->wish;
        $dbCart = auth()->user()->userCarts;
        foreach ($dbCart as $item) {
            if ($cart == $item->wishlist) {
                return response()->json(['data' => 'This product is already added!']);
            }
        }
        $userCart = new UserCart;
        $userCart->user_id = auth()->user()->id;
        $userCart->wishlist = $cart;
        if ($userCart->save()) {
            return response()->json(['data' => 'Product added to wishlist']);
        } else {
            return false;
        }
    }
    public function removeFromCart(Request $request)
    {
        $cart = UserCart::where('user_id', auth()->user()->id)->where('cart_product', $request->cart);
        if ($cart->delete()) {
            return response()->json(['data' => 'Product removed']);
        } else {
            return response()->json(['data' => 'Failed to remove from cart!']);
        }
    }
}
