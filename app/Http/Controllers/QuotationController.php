<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\QuoteRequest;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{

    public function index(){
        $quotations = Quotation::all();
        return view('pages.tables.quotation_table', ['quotations' => $quotations]);
    }
    public function topQuotations(){
        $quotations = Quotation::all();
        return view('home', ['quotations' => $quotations]);
    }
    public function allQuotations(){
        $quotations = Quotation::all();
        return view('home', ['quotations' => $quotations]);
    }
    public function quotationDetails($quotationId)
    {
        return Quotation::find($quotationId);
    }
    public function store(Request $request)
    {
        if ($request->method == 'createQuotation') {
            $this->createQuotation($request);
        }

        return redirect()->route('quote_requests.index');
    }
    
    public function addQuotation(Request $request)
    {
        $quotation = new Quotation;

        $quotation->quote_request_id = $request->quote_request_id;
        $quotation->quotation_tile = $request->quotation_tile;
        $quotation->status = $request->status;

        $quotation->save();

        return;

    }

    public function createQuotation(Request $request)
    {
        $quotation = new Quotation;

        $quotation->quote_request_id = $request->req_id;
        $quotation->quotation_tile = $request->q_title;
        $quotation->quotation_file = 'default';
        $quotation->status = 1;

        $quotation->save();

        if ($request->hasFile('quote_file')) {
            $image = $request->file('quote_file');
            $destination_path = public_path("/assets/quotations/");
            $image->move($destination_path, $quotation->id.'.pdf');
            Quotation::find($quotation->id)->update(['quotation_file' => "/assets/quotations/{$quotation->id}.pdf"]);
        }

        QuoteRequest::find($request->req_id)->update(['status' => 2]);


        session()->flash('success', 'Quotation Successfully Created!');

        return;

    }

    public function grantedQuote()
    {
        $cusId=Auth::user()->people->id;
        return Quotation::with('quote_request')
                ->whereHas('quote_request', function($query) use ($cusId) {
                    $query->where('customer_id', $cusId);
                })
                ->get();
    }

}
