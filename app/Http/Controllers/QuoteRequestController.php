<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Product;
use App\Models\Category;
use App\Traits\ResponseApi;
use App\Traits\Paginator;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;

class QuoteRequestController extends Controller
{
    use ResponseApi,Paginator;

    public function index(){
        $quote_requests = QuoteRequest::all();
        return view('pages.tables.request_table', ['quote_requests' => $quote_requests]);
    }

    public function store(Request $request)
    {
        // add a new product
        if ($request->method == 'addRequest')
        {
            $this->addRequest($request);
            return redirect('/get_quote');
        }
        
    }
    
    public function addRequest(Request $request)
    {
        $getarequest = new QuoteRequest;

        $getarequest->customer_id = $request->customer_id;
        $getarequest->quote_title = $request->quote_title;
        $getarequest->quantity = $request->quantity;
        $getarequest->dimension = $request->dimension;
        $getarequest->details = $request->details;
        $getarequest->status = $request->status;

        $getarequest->save();

        // Add Filtering
        session()->flash('success', 'Request Submitted!');

        return;
    }

    public function RequestDetails($quoterequest_id)
    {
        return QuoteRequest::find($quoterequest_id);
    }
}
