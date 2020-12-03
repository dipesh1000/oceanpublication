<div class="navbar-fixed">
    <div class="primary-navbar container ">
        <div class="logo-container">
            <img src="{{ getSiteSetting('logo') ?? '' }}" class="img-fluid" alt="{{ getSiteSetting('site_title') ?? '' }}" />
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
                        <li>
                            <a href="{{ route('categoryType') }}">
                                Product
                            </a>
                        </li>
                            <li>
                            <a href="{{ route('getContact') }}">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="" data-toggle="modal" data-target="#signin">
                                Login
                            </a>
                        </li>
                    </ul>
        </div>
        <div class="bars d-block d-lg-none">
                    <span id="ham-bar"  onclick="openNav()"><i class="fa fa-bars"></i></span>
        </div>
    </div>
</div>