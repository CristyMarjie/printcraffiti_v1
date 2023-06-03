<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\BatchOrder;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(){
        $orders = Order::all();
        return view('pages.tables.order_table', ['orders' => $orders]);
    }
    public function store(Request $request)
    {
        if ($request->method == 'placeOrder')
        {
            $this->placeOrder($request);
            return redirect()->route('cart_list');
        }
        
    }
    public function placeOrder(Request $request)
    {
        $cusId=Auth::user()->people->id;
        
        $batch_order = new BatchOrder;

        $batch_order->payment_option_id = $request->payment_option_id;
        $batch_order->customer_id = $cusId;
        $batch_order->total_subtotal = $request->txtTotalSubtotal;
        $batch_order->total_discount = $request->txtTotalDiscount;
        $batch_order->total_amount = $request->txtTotalAmount;
        $batch_order->shipping_address = $request->ship_add;
        $batch_order->shipping_cost = $request->txtShipCost;
        $batch_order->status = 1;

        $batch_order->save();

        $carts = Cart::where('status', 1)->where('temporary_status', 1)->get();
        
        foreach ($carts as $cart) {
            $order = Order::create([
                'product_id' => $cart->product_id,
                'batch_id' => $batch_order->id,
                'quantity' =>  $cart->order_quantity,
                'discount' =>  $cart->discount_amount,
                'total_amount' =>  $cart->total,
                'status' =>  1
            ]);
            // set cart status
            $cart_item = Cart::where('id', $cart->id)->first();
            $cart_item->status = 2;
            $cart_item->save();
        }

        session()->flash('success', 'Order Successful!');


        return;

    }
    public function batchOrderDetails($orderId)
    {
        return Order::with('product')->where('batch_id', $orderId)->get();
    }

}
