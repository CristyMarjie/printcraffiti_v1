<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request)
    {
        if ($request->method == 'addToCart')
        {
            $this->addToCart($request);
            return redirect('/');
        }

        if ($request->method == 'deleteCart') {
            $this->destroyCart($request->cart_id);
            return redirect('/carts');
        }
        
    }
    public function addToCart(Request $request)
    {
        if($this->existingCart($request)>0){
            $cart = Cart::where('customer_id', $request->customer_id)->where('product_id', $request->product_id)->where('status', 1)->first();
            $cart->product_id = $request->product_id;
            $cart->customer_id = $request->customer_id;
            $cart->order_quantity = intval($request->quantity)+intval($cart->order_quantity);
            $cart->discount_amount = intval($request->hidden_discount)+intval($cart->discount_amount);
            $cart->total = intval($request->hidden_total)+intval($cart->total);

            $cart->save();
        }else{
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->customer_id = $request->customer_id;
            $cart->order_quantity = $request->quantity;
            $cart->discount_amount = $request->hidden_discount;
            $cart->total = $request->hidden_total;
            $cart->status = $request->status;
            $cart->temporary_status = 0;

            $cart->save();
        }
        
        session()->flash('success', 'Add to Cart Successful!');


        return;

    }
    
    public function cartCount($cusId){
        $count = Cart::where('customer_id', '=', $cusId)->where('status', '=', 1)->count();
        return $count;
    }

    public function existingCart(Request $request){
        $count = Cart::where('customer_id', '=', $request->customer_id)->where('product_id', '=', $request->product_id)->where('status', '=', 1)->count();
        return $count;
    }
    
    public function allCarts(){
        $cusId=Auth::user()->people->id;
        $carts = Cart::where('customer_id', '=', $cusId)->where('status', '=', 1)->get();
        return view('carts', ['carts' => $carts]);
    }

    public function updateCartStatusOne($id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->temporary_status = 1;

        $cart->save();

        return;
    }
    public function updateCartStatusZero($id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->temporary_status = 0;

        $cart->save();

        return;
    }

    public function destroyCart($id)
    {
        $cart = Cart::find($id); // find the post with an id of 1
        $cart->delete();

        // Delete Filtering
        session()->flash('success', 'Cart Successfully Deleted!');
        return;
    }
}
