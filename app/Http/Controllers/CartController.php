<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addToCart($id)
    {
        if(Auth::check()){
            $existingCartItem = Cart::where('user_id', Auth::id())->where('product_id', $id)->first();
            if ($existingCartItem) {
                $existingCartItem->quantity += 1;
                $existingCartItem->save();
                return redirect()->back()->with('success', 'Product quantity updated in cart!');
            }
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->user_id = Auth::id();
            $cart->quantity = 1;
            $cart->save();

        }else{
            // 
            return redirect()->route('login')->with('error', 'You must be logged in to add items to the cart.');
        }
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function showCart(){
        if(Auth::check()){
            $cartItems = Cart::where('user_id', Auth::id())->with('product')->with('product.images')->get();
            return view('cart', compact('cartItems'));
        }else{
            return redirect()->route('login')->with('error', 'You must be logged in to view the cart.');
        }
    }

}
