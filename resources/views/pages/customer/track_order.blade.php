@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<!-- <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" /> -->
<link rel="stylesheet" href="{{asset('/assets/css/track_order.css')}}">
@endpush
@php
    use Carbon\Carbon;
@endphp
@section('content')

<!-- <section id="getaquote" class="container py-3">
    <div class="row py-5">
      <div class="col-12 text-right">
        <h2 class="fs-1 fw-b text-gray"><strong>My Order</strong></h2> -->

        <section class="container">
            <div class="container py-5 h-100">
                @foreach ($orders as $order)
                    <div class="row d-flex justify-content-center align-items-center h-100 mb-3">
                        <div class="col">
                            <div class="card card-stepper" style="border-radius: 10px;">
                                <div class="card-body p-4">

                                    <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <span class="lead fw-normal fw-bold">Order #000{{$order->id}}</span>
                                        <span class="text-muted small">{{ Carbon::parse($order->updated_at)->format('F j, Y') }}</span>
                                    </div>
                                    <div>
                                        <button data-order="{{$order->id}}" class="btn btn-outline-secondary btnOrder" type="button">View order details</button>
                                    </div>
                                    </div>
                                    <hr class="my-4">

                                    <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                        <span class="dot"></span>
                                        @switch($order->status)
                                            @case(1)
                                                <hr class="flex-fill"><span class="gray-dot"></span>
                                                <hr class="flex-fill"><span class="gray-dot"></span>
                                                <hr class="flex-fill"><span class="gray-dot"></span>
                                                <hr class="flex-fill"><span
                                                class="d-flex justify-content-center align-items-center big-gray-dot gray-dot">
                                                <i class="fa fa-check text-white"></i></span>
                                                @break
                                            @case(2)
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill"><span class="gray-dot"></span>
                                                <hr class="flex-fill"><span class="gray-dot"></span>
                                                <hr class="flex-fill"><span
                                                class="d-flex justify-content-center align-items-center big-gray-dot gray-dot">
                                                <i class="fa fa-check text-white"></i></span>
                                                @break
                                            @case(3)
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill"><span class="gray-dot"></span>
                                                <hr class="flex-fill"><span
                                                class="d-flex justify-content-center align-items-center big-gray-dot gray-dot">
                                                <i class="fa fa-check text-white"></i></span>
                                                @break
                                            @case(4)
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill"><span
                                                class="d-flex justify-content-center align-items-center big-gray-dot gray-dot">
                                                <i class="fa fa-check text-white"></i></span>
                                                @break
                                            @case(5)
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span class="dot"></span>
                                                <hr class="flex-fill track-line"><span
                                                class="d-flex justify-content-center align-items-center big-dot dot">
                                                <i class="fa fa-check text-white"></i></span>
                                                @break
                                            @default
                                                <p>Default case</p>
                                        @endswitch
                                        
                                        
                                    </div>

                                    <div class="d-flex flex-row justify-content-between align-items-center">
                                        <!-- <div class="d-flex flex-column justify-content-center"><span>15 Mar</span><span>Order
                                            placed</span></div> -->
                                        <div class="d-flex flex-column justify-content-center"><span>Order Placed</span></div>
                                        <div class="d-flex flex-column justify-content-center"><span>Order in Production</span></div>
                                        <div class="d-flex flex-column justify-content-center"><span>Order Shipped Out</span></div>
                                        <div class="d-flex flex-column align-items-center"><span>Out for delivery</span></div>
                                        <div class="d-flex flex-column align-items-end"><span>Delivered</span></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <div class="modal fade" tabindex="-1" id="trackOrderModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <table class="table text-center mb-5" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="/track_order" class="btn btn-danger">Close</a>
                    </div>
                </div>
            </div>
        </div>
         
    </div>
  </section> 
@endsection
@push('scripts')
<script src="{{ mix('/js/pages/track_order/track_order.js')}}"></script>
@endpush