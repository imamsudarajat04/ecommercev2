@extends('users.layouts.master')

@section('carts','active')
@section('title','Cart')

@section('content')
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Cart</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
    </section>
      
    <section class="py-5">
      @php
        $total = 0;
      @endphp
      <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
        <div class="row">
          <div class="col-lg-8 mb-4 mb-lg-0">
            <!-- CART TABLE-->
            <div class="table-responsive mb-4">
              <table class="table">
                <thead class="bg-light">
                  <tr>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                    <th class="border-0" scope="col"> </th>
                  </tr>
                </thead>
                <tbody>
                  @if ($carts->count() == 0)
                      <p style="text-align: center">Cart is empty</p>
                  @endif
                  @foreach ($carts as $cart)
                    <tr>
                      <th class="pl-0 border-0" scope="row">
                        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="detail.html"><img src="{{ \Storage::url($cart->product->image) }}" alt="..." width="70"/></a>
                          <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="detail.html">{{ $cart->product->name }}</a></strong></div>
                        </div>
                      </th>
                      <td class="align-middle border-0">
                        <p class="mb-0 small">Rp. {{ number_format($cart->product->price) }}</p>
                      </td>
                      <td class="align-middle border-0">
                        <div class="border d-flex align-items-center justify-content-between px-3"><span class="small text-uppercase text-gray headings-font-family">Quantity</span>
                          {{-- <div class="quantity">
                            <select name="qty" class="form-control form-control-sm border-0 shadow-0 p-0 qty">
                              @for ($i = 1; $i <= $cart->product->stock; $i++)
                                <option value="{{ $i }}" {{ $i == $cart->qty ? 'selected' : '' }}>{{ $i }}</option>
                              @endfor
                            </select>
                          </div> --}}
                          <div class="quantity">
                            <select name="qty" class="form-control form-control-sm border-0 shadow-0 p-0 qty" data-item="{{ $cart->id }}">
                              @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" {{ $i == $cart->qty ? 'selected' : '' }}>{{ $i }}</option>
                              @endfor
                            </select>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle border-0">
                        <p class="mb-0 small">Rp. {{ number_format($cart->product->price * $cart->qty) }}</p>
                      </td>
                      {{-- <td class="align-middle border-0"><a class="reset-anchor" href="{{ route('carts.destroy', $cart->id) }}"><i class="fas fa-trash-alt small text-muted"></i></a></td> --}}
                      <td class="align-middle border-0"><button class="btn reset-anchor delete-product" data-id="{{ $cart->product->id }}"><i class="fas fa-trash-alt small text-muted"></i></button></td>
                    </tr>
                    @php
                      $total += $cart->product->price * $cart->qty;
                    @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- CART NAV-->
            <div class="bg-light px-4 py-3">
              <div class="row align-items-center text-center">
                <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="{{ route('shop.index') }}"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="{{ route('checkout.index') }}">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
              </div>
            </div>
          </div>
          <!-- ORDER TOTAL-->
          <div class="col-lg-4">
            <div class="card border-0 rounded-0 p-lg-4 bg-light">
              <div class="card-body">
                <h5 class="text-uppercase mb-4">Cart total</h5>
                <ul class="list-unstyled mb-0">
                  <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Subtotal</strong><span class="text-muted small">Rp. {{ number_format($total) }}</span></li>
                  <li class="border-bottom my-2"></li>
                  <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span>Rp. {{ number_format($total) }}</span></li>
                  <li>
                    <form action="#">
                      <div class="form-group mb-0">
                        <input class="form-control" type="text" placeholder="Enter your coupon">
                        <button class="btn btn-dark btn-sm btn-block" type="submit"> <i class="fas fa-gift mr-2"></i>Apply coupon</button>
                      </div>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection

@push('customjs')
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
      (function() {
        const classname = document.querySelectorAll('.qty')
        // const classname = document.getElementsByClassName('.qty')

        Array.from(classname).forEach(function(element) {
          element.addEventListener('change', function() {
            const id = element.getAttribute('data-item')
            axios.patch(`/carts/${id}`, {
              qty: this.value,
              id: id
            })
            .then(function (response) {
              window.location.href = '/carts'
              // console.log(response);
            })
            .catch(function (error) {
              console.log(error);
            });
          })
        })
      })();

      $(".delete-product").click(function() {
        var id =  $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax(
        {
          url: "carts/"+id,
          type: 'DELETE',
          data: {
            "id": id,
            "_token": token,
          },
          success: function (data) {
            // console.log(data);
            window.location.href = '/carts'
          },
          error: function (data) {
            console.log('Error:', data);
          }

        });

      });
    </script>
@endpush