@extends('frontend.layouts.app')
@section('content')
<div id="savedcourses_page">
    <div class="row no-gutters">
      @include('userdashboard.partials.side-nav')
      <div class="col-md-8 col-lg-9">
        <div class="savedcourses_content">
            <div class="d_breadcrumb">
              <ul>
                <li>
                  <a href=""> Home </a>
                </li>
                <li>/</li>
                <li class="active">
                  <a href="saved-courses.html">
                    <span>Saved Courses</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>

        <div class="course_container">
          <div class="row">
            <div class="col-lg-12">
              <div class="savedcourses-content">
                @php
                    $total = 0
                @endphp
                @if (session('cart'))
                <div class="row">
                    <div
                      class="col-lg-9 order-lg-1 order-md-12 order-sm-12 order-2"
                    >
                    @foreach (session('cart') as $id => $details)
                    @php
                        $total += $details['offer_price'] * $details['quantity']
                    @endphp
                    <div class="saved-courses-list">
                      <div class="row">
                        <div class="col-lg-2">
                          <div class="course-image">
                          <img src="{{ $details['image'] }}" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="course-details">
                            <div class="course-title">
                            <strong>{{ $details['title'] }}</strong>
                            </div>
                            <div class="course-subtitle">
                                {{ $details['description'] }}
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="course-add-remove">
                            {{-- <button class="add-to-cart-button">Add</button> --}}
                           
                          <button class="remove-from-cart-button remove-from-cart" data-id="{{ $id }}">
                              Remove
                            </button>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="course-price">
                            <strong>Rs. {{ $details['offer_price'] }}</strong>
                            <s>Rs. {{ $details['price'] }}</s>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    </div>
                    <div
                      class="col-lg-3 order-lg-12 order-md-1 order-sm-1 order-1"
                    >
                      <div class="total-checkout-price-section">
                        Total
                        <p class="total-price">Rs.{{ $total }} /-</p>
                        <button class="checkout-button">Checkout</button>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script type="text/javascript">
    $('.remove-from-cart').click(function (e) {
        e.preventDefault();

        var ele = $(this);
        if(confirm("Are You Sure")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: 'DELETE',
                data: {_token: '{{ csrf_token() }}', id: ele.attr('data-id')},
                success: function(response) {
                    window.location.reload();
                }
            })
        }
    })
  </script>
@endsection

