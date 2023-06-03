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
    <!-- <div class="row py-2">
        <div class="col-12 text-right">
            <h2 class="display-6"><strong><br>Sign Up</strong></h2>
        </div>
    </div> -->
    
    <div class="row py-2 card">
        <form method="post" action="{{route('sign_up.store')}}" class="col-11 align-self-center">
        @csrf
            <h5 class="display-6 text-gray text-center mt-5">
            <b>CREATE ACCOUNT</b></h5>
              <!-- <label>Please enter details to create account!</label> -->
            <div class="modal-body">
              <div class="row g-2">
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="firstname" name="firstname" required>
                    <label for="floatingInputGrid">Firstname</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                    <label for="floatingInputGrid">Lastname</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="phone_number" name="phone_number" required>
                    <label for="floatingInputGrid">Contact Number</label>
                  </div>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" id="address1" placeholder="" name="address1" required>
                  <label>Address</label>
                </div>
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" placeholder="" name="email" required>
                  <label>Email</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <!-- <div class="form-floating mb-3">
                  <input required type="password" class="form-control" id="floatingPassword" placeholder="" required>
                  <label for="floatingPassword">Re-type password</label>
                </div> -->
                <input type="hidden" class="form-control" name="method" id="method" value="signUp">
                <input type="hidden" class="form-control" name="role_id" id="role_id" value="3">
              </div>
              <div class="text-center mb-3">
                Already have an account? <a class="btn btn-sm rounded-pill fw-bold" href="/login">Login</a>
              </div>
              @if(session()->has('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

              <button type="submit" class="btn btn-lg btn-dark d-grid gap-2 col-6 mx-auto mb-3">Create Account</button>
            </div>
        </form>
    </div>
    <!--hr class="dashed-2 col-12 mt-4"-->
</section>
@endsection