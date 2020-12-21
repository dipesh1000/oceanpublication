@extends('frontend.layouts.app')
@section('content')

<div id="cart_page">
    <div class="bread_container">
      <ul class="bread">
        <li>
          <a href=""><i class="fa fa-home"></i> Home &gt;</a>
        </li>
        <li><a href="">Cart</a></li>
      </ul>
    </div>
    <div class="cart-section">
      <div class="cart-savedcourses-content">
        @php
            $total = 0;
        @endphp
        @if (Cart::instance('default')->count())
        <div class="row">
          <div class="col-lg-9 order-lg-1 order-md-12 order-sm-12 order-2">
            @foreach ($courses as $cartContent)
                    @php
                        $total += $cartContent->offer_price
                    @endphp
            <div class="cart-saved-courses-list">
              <div class="row">
                <div class="col-lg-3">
                  <div class="cart-course-image">
                    <img src="{{ $cartContent->image }}" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="cart-course-details">
                    <div class="cart-course-title">
                      <strong>{{ $cartContent->title }}</strong>
                    </div>
                    <div class="cart-course-subtitle">
                      Lorem, ipsum dolor sit amet consectetur adipisicing
                      elit.
                    </div>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="cart-course-add-remove">
                    <button class="cart-add-to-cart-button remove-from-cart" data-id="{{ $cartContent->cartId }}">
                      Remove
                    </button>
                  </div>
                </div>
                <div class="col-lg-1">
                  <div class="cart-course-price">
                    <strong>{{ $cartContent->offer_price }}</strong>
                    <div><s>{{ $cartContent->price }}</s></div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="col-lg-3 order-lg-12 order-md-1 order-sm-1 order-1">
            <div class="cart-total-checkout-price-section">
              Total
              <p class="cart-total-price">Rs. {{ $total }} /-</p>
              <p><del>Rs. 12000</del></p>
              <form action="{{ route('checkout.store')  }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="ttlPrice" value="{{ $total }}">
                <button class="cart-checkout-button checkout" data-total="{{ $total }}">Checkout</button>
              </form>
            </div>
          </div>
        </div>
        @else 
          <h1>No Product Found in Your Cart!</h1>
          <p>Select  <a href="{{ route('categoryType') }}" class="btn btn-outline-primary"> Visit Interested Courses </a>  Form here!!!</p>
        @endif
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script>
    $('.remove-from-cart').click(function (e) {
        e.preventDefault();

        var ele = $(this);
        if(confirm("Are You Sure")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: 'DELETE',
                data: {_token: '{{ csrf_token() }}', id: ele.attr('data-id')},
                success: function(response) {
                    console.log(response)
                    window.location.reload();
                }
            })
        }
    })
   
    // Order Store Request
    // $(document).on("click", ".checkout", function (e) {
    //         e.preventDefault();
    //         var $this = $(this);
    //         var price = $this.attr('data-total');
    //         alert($price);
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $.ajax({
    //             type: "POST",
    //             url: "{{ route('checkout.store')  }}",
    //             data: {
    //                 price: price
    //             },
    //             beforeSend: function () {
    //                 $this.prop('disabled', true);
    //             },
    //             success: function (data) {
    //               if (data.status) {
    //                 swal(data.status, data.message, "success");
    //               }
    //             },
    //             error: function (xhr, ajaxOptions, thrownError) {
    //                 console.log(thrownError);
    //             },
    //             complete: function () {
    //                 location.reload();
    //             }
    //         });

    //     });
        
    //payment with esewa
    // var path="https://uat.esewa.com.np/epay/main";
    // var params= {
    //     amt: 100,
    //     psc: 0,
    //     pdc: 0,
    //     txAmt: 0,
    //     tAmt: 100,
    //     pid: "ee2c3ca1-696b-4cc5-a6be-2c40d929d453",
    //     scd: "EPAYTEST",
    //     su: "http://merchant.com.np/page/esewa_payment_success",
    //     fu: "http://merchant.com.np/page/esewa_payment_failed"
    // }

    // function post(path, params) {
    //     var form = document.createElement("form");
    //     form.setAttribute("method", "POST");
    //     form.setAttribute("action", path);

    //     for(var key in params) {
    //         var hiddenField = document.createElement("input");
    //         hiddenField.setAttribute("type", "hidden");
    //         hiddenField.setAttribute("name", key);
    //         hiddenField.setAttribute("value", params[key]);
    //         form.appendChild(hiddenField);
            
    //     }

    //     document.body.appendChild(form);
    //     form.submit();
    // }
  </script>

  @endpush