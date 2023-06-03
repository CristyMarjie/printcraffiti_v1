@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- <section class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide container py-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="assets/img/faq.png" class="d-block w-100" alt="Slide 1">
            </div>
        </div>
    </div>
  </section> -->
  
<section id="faq" class="container py-3">
    <div class="row py-2">
        <div class="col-12 text-right">
            <h2 class="display-6"><strong><br>Request a Quote</strong></h2>
        </div>
    </div>
    <form method="post" action="{{route('request_quote.store')}}" id="myForm">
        @csrf
        <input type="hidden" name="method" id="myMethod" value="addRequest">
        <input type="hidden" name="req_id" id="req_id" value="">
        <input type="hidden" name="customer_id" id="customer_id" value="{{Auth::user()->people->id}}">
        <input type="hidden" name="status" value="1" id="status"> 

        <div class="row py-2">
            <i>Is there a more specific type of product you want us to quote ? Fill out this form to</i> 

            <h2 class="fs-3 fw-b text-gray mt-4"><strong>Quote Details</strong></h2>
                    <div class="col-12 mb-3">
                        <div class="form-floating">
                        <input type="text" class="form-control" name="quote_title" id="quote_title" required>
                        <label for="quote_title">Quote Title<span class="text-danger">*</span></label>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                        <div class="form-floating">
                        <input type="number" class="form-control" name="quantity" id="quantity">
                        <label for="reqQuantity">Quantity<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                        <div class="form-floating">
                        <input type="text" class="form-control" name="dimension" id="dimension">
                        <label for="reqQuantity">Dimension<span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="details" id="details" style="height: 100px"></textarea>
                        <label for="reqDetails">Details</label>
                        </div><br>

                        @if(session()->has('success'))
                        <div class="alert alert-success text-center">
                            <strong>{{ session('success') }}</strong>
                        </div>
                        @endif
                        
                    </div>

                    
                    <div class="col-12 mb-3">
                        <button type="submit" class="btn btn-lg btn-dark mb-5">Submit</button>
                    </div>
        </div>
    </form>
    <!--hr class="dashed-2 col-12 mt-4"-->
</section>

@endsection