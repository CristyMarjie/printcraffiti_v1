<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BatchOrder;

class BatchOrderController extends Controller
{
    public function index()
    {
        // $batch_orders = BatchOrder::with('people')->get();
        $batch_orders = BatchOrder::all();
        return view('pages.tables.order_table', ['batch_orders' => $batch_orders]);
    }
    public function store(Request $request)
    {

        if ($request->method == 'delete') {
            $this->destroy($request->id);
        }

        return redirect()->route('orders.index');
    }

    public function orderProduction($batchId)
    {
        $batch_order = BatchOrder::findOrFail($batchId);
        $batch_order->status = 2;
        $batch_order->save();

        return;
    }

    public function shippedOut($batchId)
    {
        $batch_order = BatchOrder::findOrFail($batchId);
        $batch_order->status = 3;
        $batch_order->save();

        return;
    }

    public function forDelivery($batchId)
    {
        $batch_order = BatchOrder::findOrFail($batchId);
        $batch_order->status = 4;
        $batch_order->save();

        return;
    }

    public function delivered($batchId)
    {
        $batch_order = BatchOrder::findOrFail($batchId);
        $batch_order->status = 5;
        $batch_order->save();

        return;
    }

    
}
