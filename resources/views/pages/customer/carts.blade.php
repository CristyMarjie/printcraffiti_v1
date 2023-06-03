@extends('layouts.app')

@section('title', 'Home')

@section('content')

<section id="getaquote" class="container py-3">
    <div class="row py-5">
      <div class="col-12 text-right">
        <h2 class="fs-1 fw-b text-gray"><strong>My Cart</strong></h2>
        
        <div class="row py-2">
            <table class="table text-center">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Unit Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Discount</th>
                  <th scope="col">Total</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($carts as $cart)
                <tr>
                  <td><input type="checkbox" name="selectedItems[]" value="{{ $cart->discount_amount }}:{{ $cart->total }}:{{ $cart->id }}" class="form-check-input checkbox"></td>
                  <td><img src="assets/products/{{$cart->product_id}}.jpg" style="height:50px;width:50px;border-radius:5px;" class="card-img-top" alt=""></td>
                  <td>{{$cart->product->name}}</td>
                  <td>{{ number_format($cart->product->unit_price, 2, '.', ',') }}</td>
                  <td>{{$cart->order_quantity}}</td>
                  <td>{{ number_format($cart->discount_amount, 2, '.', ',') }}</td>
                  <td>{{ number_format($cart->total, 2, '.', ',') }}</td>
                  <td><a href="#" data-bs-toggle="tooltip modal" data-bs-placement="bottom" title="Remove Item" data-cart="{{$cart->id}}" class="btn btn-danger deleteConfirm fa-solid fa-trash"></a></td>
                </tr>
              @endforeach
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  
                  <td><strong>TOTAL : </strong><br/></td>
                  <td colspan="2"><strong>₱<label id="allTotal">0</label></strong></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
      
          </div>
          
          <form method="post" action="{{route('orders.store')}}">
            @csrf
            <input type="hidden" id="txtTotalSubtotal" name="txtTotalSubtotal">
            <input type="hidden" id="txtTotalDiscount" name="txtTotalDiscount">
            <input type="hidden" id="txtShipCost" name="txtShipCost" value="150">
            <input type="hidden" id="txtTotalAmount" name="txtTotalAmount">
            <input type="hidden" id="method" name="method" value="placeOrder">
              <div class="row mb-2 justify-content-end">
                <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                  <div class="form-floating ">
                    <input type="text" class="form-control" id="ship_add" name="ship_add" value="{{Auth::user()->people->address1}}">
                    <label for="ship_add">Shipping Address<span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                  <label id="lblSubtotal">Order Subtotal:</label>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                  <label id="lblTotalDiscount">Total Discount:</label>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                  <label id="lblShipCost">Shipping Cost: </label>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                  <label id="lblOrderTotal">Order Total :</label>
                </div>
              </div>
              <div class="row mb-2 justify-content-end">
                <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                  <div class="form-floating">
                    <select class="form-select" id="payment_option_id" name="payment_option_id" aria-label="Floating label select example">
                      <option value="1">Cash On Delivery</option>
                    </select>
                    <label for="floatingSelect">Payment Method</label>
                  </div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-md-6 col-sm-12 col-xs-12 col-12 col-lg-6 mb-3">
                  <button type="submit" class="btn btn-outline-dark p-2 px-4">Place Order</button>
                </div>
              </div>
            </div>
          </form>
          @if(session()->has('success'))
              <div class="alert alert-success text-center">
                  {{ session('success') }}
              </div>
          @endif
    </div>
  </section>

  <div class="modal fade" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('carts.store')}}">
                @csrf

                <div class="modal-body text-center">
                
                    <p class="fas fa-triangle-exclamation  text-danger" style="font-size: 50px;"></p><p style="font-size: 18px;">
                    Are you sure you want to delete this cart?
                    </p>
                    <input type="hidden" name="method" value="deleteCart">
                    <input type="hidden" name="cart_id" id="cart_id">
                    <button type="submit" class="btn btn-primary m-3">Yes</button>
                    <button type="button" class="btn btn-light m-3" data-bs-dismiss="modal">No</button>
                </div>
                
                    
                
                <!-- <div class="modal-footer">
                    
                </div> -->
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ mix('/js/pages/customer_cart/customer_cart.js')}}"></script>
@endpush