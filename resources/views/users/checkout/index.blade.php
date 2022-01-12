@extends('users.layouts.master')

@section('title','Cart')

@section('content')
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Checkout</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item"><a href="/carts">Cart</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
    </section>
    <section class="py-5">
        <!-- BILLING ADDRESS-->
        <h2 class="h5 text-uppercase mb-4">Billing details</h2>
        <div class="row">
          <div class="col-lg-8">
            <form action="#">
              <div class="row">
                <div class="col-lg-12 form-group">
                  <label class="text-small text-uppercase" for="name">Name</label>
                  <input class="form-control form-control-lg" id="name" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="Enter your name" required>
                </div>
                <div class="col-lg-6 form-group">
                  <label class="text-small text-uppercase" for="email">Email address</label>
                  <input class="form-control form-control-lg" id="email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="e.g. Jason@example.com" required>
                </div>
                <div class="col-lg-6 form-group">
                  <label class="text-small text-uppercase" for="phone">Phone number</label>
                  <input class="form-control form-control-lg" id="phone" type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="e.g. +02 245354745">
                </div>
                <div class="col-lg-12 form-group">
                  <label class="text-small text-uppercase" for="address">Address line 1</label>
                  <input class="form-control form-control-lg" id="address" type="text" name="address" value="{{ old('address', Auth::user()->address) }}" placeholder="House number and street name" required>
                </div>
                <div class="col-lg-12 form-group">
                  <label class="text-small text-uppercase" for="address">Address line 2</label>
                  <input class="form-control form-control-lg" id="addressalt" type="text" placeholder="Apartment, Suite, Unit, etc (optional)">
                </div>
                <div class="col-lg-6 form-group">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="alternateAddressCheckbox" type="checkbox">
                    <label class="custom-control-label text-small" for="alternateAddressCheckbox">Alternate billing address</label>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="row d-none" id="alternateAddress">
                    <div class="col-12 mt-4">
                      <h2 class="h4 text-uppercase mb-4">Alternative billing details</h2>
                    </div>
                    <div class="col-lg-12 form-group">
                      <label class="text-small text-uppercase" for="name2">Name</label>
                      <input class="form-control form-control-lg" id="firstName2" type="text" placeholder="Enter your name">
                    </div>
                    <div class="col-lg-6 form-group">
                      <label class="text-small text-uppercase" for="email2">Email address</label>
                      <input class="form-control form-control-lg" id="email2" type="email" placeholder="e.g. Jason@example.com">
                    </div>
                    <div class="col-lg-6 form-group">
                      <label class="text-small text-uppercase" for="phone2">Phone number</label>
                      <input class="form-control form-control-lg" id="phone2" type="tel" placeholder="e.g. +02 245354745">
                    </div>
                    <div class="col-lg-12 form-group">
                      <label class="text-small text-uppercase" for="address2">Address line 1</label>
                      <input class="form-control form-control-lg" id="address2" type="text" placeholder="House number and street name">
                    </div>
                    <div class="col-lg-12 form-group">
                      <label class="text-small text-uppercase" for="address2">Address line 2</label>
                      <input class="form-control form-control-lg" id="addressalt2" type="text" placeholder="Apartment, Suite, Unit, etc (optional)">
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 form-group">
                  <button class="btn btn-dark" type="submit">Place order</button>
                </div>
              </div>
            </form>
        </div>
        <!-- ORDER SUMMARY-->
        <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <h5 class="text-uppercase mb-4">Your order</h5>
                <ul class="list-unstyled mb-0">
                    @php
                        $total = 0;
                    @endphp
                @foreach ($carts as $cart)
                    @php
                      $total += $cart->product->price * $cart->qty;
                    @endphp
                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">{{ $cart->product->name }}</strong><span class="text-muted small">Rp. {{ number_format($cart->product->price * $cart->qty) }}</span></li>
                    <li class="border-bottom my-2"></li>
                @endforeach
                  <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Total</strong><span>Rp. {{ number_format($total) }}</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection