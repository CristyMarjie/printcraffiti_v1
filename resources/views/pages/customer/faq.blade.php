@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="container-fluid">
    <div id="carouselExampleIndicators" class="carousel slide container py-3" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="assets/img/faq.png" class="d-block w-100" alt="Slide 1">
            </div>
        </div>
    </div>
  </section>
<section id="faq" class="container py-3">
        <div class="row py-5">
        <div class="col-12 text-right">
            <h2 class="display-6"><strong><br>Frequently Asked Questions</strong></h2>
        </div>
        </div>
    
        <div class="row mb-4">
    
            <div class="col-12 col-lg-12">
                <div class="accordion" id="accordion_1">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">
                            What is you business hours ?
                        </button>
                        </h2>
                        <div id="collapse_1" class="accordion-collapse collapse" aria-labelledby="heading_1" data-bs-parent="#accordion_1" style="">
                        <div class="accordion-body">
                            <strong>Our online store is 24/7.</strong> You can visit and place an order anytime of the day.
                            For pick-up orders, our shop is open from 8:30 AM to 12NN, Monday to Saturday.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
                            How do we contact you ?
                        </button>
                        </h2>
                        <div id="collapse_2" class="accordion-collapse collapse" aria-labelledby="heading_2" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                         <a class="nav-link text-dark" aria-current="page" href="contact.html"> View the <strong>Contact Us</strong> page or 
                          You can contact us directly and in person by visiting our office. We also have a
                          contact form that you can fill out to ask us anything with.</a>
                          </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_3" aria-expanded="false" aria-controls="collapse_3">
                            How long does it take to process an order ?
                        </button>
                        </h2>
                        <div id="collapse_3" class="accordion-collapse collapse" aria-labelledby="heading_3" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                          Processing<strong> 2-3 Working Days</strong> 
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                          I made a mistake with my order, can I cancel?
                        </button>
                        </h2>
                        <div id="collapse_4" class="accordion-collapse collapse" aria-labelledby="heading_4" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                          Please contact us as soon as possible after <strong>placing your order if you need to cancel for any reason.  </strong>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_5" aria-expanded="false" aria-controls="collapse_5">
                            Do you give discounts ?
                        </button>
                        </h2>
                        <div id="collapse_5" class="accordion-collapse collapse" aria-labelledby="heading_5" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                          We publish our prices online to make the checkout process as transparent as possible.
                          The price you click to place the order is the price you pay <strong>(excluding delivery, where applicable).</strong>                       
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_6" aria-expanded="false" aria-controls="collapse_6">
                            How do we send the payment ?
                        </button>
                        </h2>
                        <div id="collapse_6" class="accordion-collapse collapse" aria-labelledby="heading_6" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                          We accept the following payment methods: Gcash, Bank transfer and Maya.
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_7" aria-expanded="false" aria-controls="collapse_7">
                            Where do I send my files ?
                        </button>
                        </h2>
                        <div id="collapse_7" class="accordion-collapse collapse" aria-labelledby="heading_7" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                            <strong>Email:</strong> printcraffiti@gmail.com
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_8">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_8" aria-expanded="false" aria-controls="collapse_8">
                            Can I change any specs of my order ?
                        </button>
                        </h2>
                        <div id="collapse_8" class="accordion-collapse collapse" aria-labelledby="heading_8" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                            <strong>No.</strong>Once you have approved your data, we will start the data compilation and production will start that day.
                            From this point we are unable to accept changes to either the order specs. If you notice an error immediately having placed
                            the order however, call us as soon as possible and we may be able to rectify the error or adjust the specs
                            (e.g increase the quantity, change paper type etc.).
                        </div>
                        </div>
                    </div> <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_9">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_9" aria-expanded="false" aria-controls="collapse_9">
                            Do you have design templates for me to choose on ?
                        </button>
                        </h2>
                        <div id="collapse_9" class="accordion-collapse collapse" aria-labelledby="heading_9" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                          <a class="nav-link text-dark" aria-current="page" data-bs-toggle="modal" data-bs-target="#designtemplates"> Yes. Click <strong>Design Templates</strong></a>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading_10">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_10" aria-expanded="false" aria-controls="collapse_10">
                            Do you offer Cash-On-Delivery (COD) ? 
                        </button>
                        </h2>
                        <div id="collapse_10" class="accordion-collapse collapse" aria-labelledby="heading_10" data-bs-parent="#accordion_1">
                        <div class="accordion-body">
                            Cash-On-Delivery, as in, paying the the remaining balance in cash,
                            on delivery, <strong>is acceptable.</strong> When your order is delivered, you can pay our delivery
                            agents directly and receive printed receipt for the said amount.
                        </div>
                        </div>
                    </div>
              


                </div>  
            </div>
    </div>
    <!--hr class="dashed-2 col-12 mt-4"-->
    </section>
@endsection