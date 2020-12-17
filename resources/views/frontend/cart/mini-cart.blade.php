<div class="cart-in-navbar">
    <div class="cart-icon">
      <div class="cart-icon-wrapper">
        <a href="{{ route('cart') }}"><i class="fa fa-shopping-cart"></i></a>
        <div class="cart-icon-counter">{{Cart::instance('default')->count()}}</div>
      </div>
      @if(Cart::instance('default')->count())
      @php
            $total = 0;
        @endphp
      <div class="cart-dropdown-content">
        <div class="cart-dropdown-content-wrapper">
            @foreach (Cart::content() as $cart)
            @php
                $total += getCoursesByType($cart)->offer_price
            @endphp
            <div class="cart-dropdown-single">
                <div class="cart-dropdown-single-image">
                  <img src="{{getCoursesByType($cart)->image}}" />
                </div>
                <div class="cart-dropdown-single-text">
                    @if($cart->name=='package')
                    <a href="{{ route('package.single', getCoursesByType($cart)->slug) }}" class="text-dark">
                    {{getCoursesByType($cart)->title}}</a>
                    @elseif($cart->name == 'book')
                    <a href="{{ route('book.single', getCoursesByType($cart)->slug) }}" class="text-dark">
                        {{getCoursesByType($cart)->title}}</a>
                    @else
                    <a href="{{ route('video.single', getCoursesByType($cart)->slug) }}" class="text-dark">
                        {{getCoursesByType($cart)->title}}</a>
                    @endif
                  <div class="cart-dropdown-single-price">
                    Rs. {{getCoursesByType($cart)->offer_price}} <del>Rs. {{getCoursesByType($cart)->price}}</del>
                  </div>
                </div>
              </div>
            @endforeach
          <div
            class="cart-dropdown-single"
            id="cart-dropdown-single-price-section"
          >
            <div class="cart-dropdown-total-price">
              <div>Total Price:</div>
              <div>Rs. {{ $total }}</div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>