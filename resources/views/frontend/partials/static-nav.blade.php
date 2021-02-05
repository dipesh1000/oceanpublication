<div class="navbar-fixed">
    <div class="primary-navbar container ">
        <div class="logo-container">
            <a href="{{ URL::to('/') }}">
                <img src="{{ URL::to(getSiteSetting('logo') ?? '') }}" class="img-fluid" alt="{{ getSiteSetting('site_title') ?? '' }}" />
            </a>
        </div>
        <div class="primary-content">
            <ul class="first-navbar-wrapper">
                <li>
                    <form action="{{ url('/search') }}" type="get" role="search">
                        <input type="text" name="q" id="query" class="search-bar" placeholder="Search here">
                    </form>
                    <a>
                        <i id="search-icon" class="fas fa-search"></i>
                    </a>
                </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <a href="tel:{{ getSiteSetting('primary_phone') ?? '' }}">{{ getSiteSetting('primary_phone') ?? '' }}</a>
                        
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:{{ getSiteSetting('primary_email') ?? '' }}">{{ getSiteSetting('primary_email') ?? '' }}</a>
                        </li>
                        @if ($user = Sentinel::check())
                        <li class="p-1 ml-4">
                            <a href="{{ route('userDashboard') }}"><i class="fa fa-user-circle"></i>{{ $user->first_name }}</a>
                        </li>
                        @endif
                    </ul>
                    <ul class="second-navbar-wrapper">
                        <li>
                        <a href="{{ URL::to('/') }}">
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="/about-us">About us</a>
                        </li>
                        <li>
                            <a href="{{ route('package') }}">
                                Packages
                            </a>
                        </li>
                        <li class="fixed-visible">
                            <a href="{{ route('postType', 'authors') }}">
                                    Author
                            </a>
                        </li>
                        <li class="fixed-visible">
                            <a href="{{ route('postType',  'distributors') }}">
                                Distributor
                            </a>
                        </li>
                        
                        <li>
                        <a href="{{ route('getContact') }}">
                            Contact
                        </a>
                        </li>
                        <li>
                            @if ($user = Sentinel::check())
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <a href="" onclick="this.parentNode.submit(); return false;">Logout</a>
                            </form>
                        @else
                            <a href="" data-toggle="modal" data-target="#signin">
                                Login
                            </a>
                        @endif
                        </li>
                        <li>
                           @include('frontend.cart.mini-cart')
                        </li>
                    </ul>
        </div>
        <div class="bars d-block d-lg-none">
                    <span id="ham-bar"  onclick="openNav()"><i class="fa fa-bars"></i></span>
        </div>
    </div>
</div>