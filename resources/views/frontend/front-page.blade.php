@extends('frontend.layouts.app')
@section('content')
<div id="index_page">
        <div class="banner">
				<div class="navbar-wrapper">
					<div class="primary-navbar container ">
						<div class="logo-container">
							<img src="{{ getSiteSetting('logo') ?? '' }}" class="img-fluid" alt="" />
						</div>
						<div class="primary-content">
							<ul class="first-navbar-wrapper">
                                <!-- <li>
                                    <input type="search" class="search-bar" placeholder="Search">
									<a>
                                        <i id="search-icon" class="fas fa-search"></i>
                                    </a>
								</li> -->
								<li>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:{{ getSiteSetting('primary_phone') ?? '' }}">{{ getSiteSetting('primary_phone') ?? '' }}</a>
								
                                </li>
                                
								<li>
                                    <i class="fas fa-envelope"></i>
                                <a href="mailto:{{ getSiteSetting('primary_email') ?? '' }}">{{ getSiteSetting('primary_email') ?? '' }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('cart') }}" class="btn btn-outline-light btn-sm">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
                                        Cart <span class="badge badge-pill badge-danger">{{ count((array)session('cart')) }}</span>
                                    </a>
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
                              
                                    <li class="fixed-visible">
                                        <a href="">
                                            Publication
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
									<a href="" data-toggle="modal" data-target="#signin">
										Login
									</a>
                                </li>
                                   <li>
                                    <form action="{{ url('/search') }}" type="get" role="search">
                                        <input type="text" name="q" id="query" class="search-bar" placeholder="Search here">
                                    </form>
                                    {{-- <div id="book_list"></div> --}}
									<a>
                                        <i id="search-icon" class="fas fa-search"></i>
                                    </a>
								</li>
                            </ul>
						</div>
						<div class="bars d-block d-lg-none">
							<span id="ham-bar"  onclick="openNav()"><i class="fa fa-bars"></i></span>
						</div>
					</div>
				</div>
				<div class="slider-wrapper">
                    @foreach ($mainSliders as $item)
                        <div class="slider">
                            <div class="img-container">
                            <img src="{{ $item->image }}" class="img-fluid" alt="{{ $item->title }}" />
                            </div>
                            <div class="overlay-container">
                                <div class="container">
                                    <div class="title">{{ $item->title }} </div>
                                    <div class="subtitle">
                                        {!! $item->post_content !!} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
					
				</div>
		</div>

        <!-- <div class="banner_box_container">
            <div class="container">
                <div class="trips_container">
                    <div class="row no-gutters">
                        <div class="col-lg-4">
                            <div class="trips">
                                <div class="trips_icon">
                                    <i class="fas fa-video"></i>
                                </div>
                                <div class="trips_details">
                                    <div class="trips_details_header">
                                        100,000 online courses
                                    </div>
                                    <div class="trips_details_para"> 
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="trips">
                                <div class="trips_icon">
                                    <i class="fas fa-video"></i>
                                </div>
                                <div class="trips_details">
                                    <div class="trips_details_header">
                                        100,000 online courses
                                    </div>
                                    <div class="trips_details_para"> 
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="trips">
                                <div class="trips_icon">
                                    <i class="fas fa-video"></i>
                                </div>
                                <div class="trips_details">
                                    <div class="trips_details_header">
                                        100,000 online courses
                                    </div>
                                    <div class="trips_details_para"> 
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div> -->

        <div class="our_publication_container">
               <div class="our_publication_header">
                    Our Publications
                </div>
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-md-6 col-xl-3">
                            <a href="{{ route('category.single', $category->slug) }}">
                                <div class="publication_container">
                                <div class="book_icon">
                                <i class="{{ $category->icon ?? 'fas fa-book-open' }}"></i>
                                    </div>
                                    <div class="book_container_title">
                                    <i class="fas fa-film"></i>  {{ $category->title }}
                                    </div>
                                    <div class="book_container_text"> 
                                        {{-- {!! \Illuminate\Support\Str::limit($category->description, 20, '...') !!} --}}
                                        {{-- {!! $category->description !!} --}}
                                    </div>
                                    <div class="book_container_btn">
                                        <span>
                                            Browse Now
                                        </span>
                                    
                                    </div>
                                </div>
                            </a> 
                        </div>
                    @endforeach
                </div>
        </div>
        <!-- <div class="our-video-library">
            <div class="video-library-title">
                Our Video Library
            </div>
            <div class="video-slider">
               <div class="">
                <div class="video-item">
                    <div class="img-container">
                        <img src="img/banner11.jpg" class="img-fluid" alt="">
                    </div>
                </div>
               </div>
            </div>
        </div> -->
        <div class="our_package_container">
            <div class="container">
                <div class="our_package_header">
                    Our Packages
                </div>
                
                <div class="row">
                    @foreach($packages as $package)
                    {{-- {{ dd($package) }} --}}
                    <div class="col-md-3">
                        <div class="course_container">
                            <div class="image_container">
                            <a href="{{ route('package.single', $package->slug) }}">
                                    <img class="img-fluid" src="{{ $package->image }}" alt="{{ $package->title }}">
                                </a>  
                                <div class="course_price">
                                    {{ $package->offer_price }}
                                </div>
                            </div>
                            <div class="course_title">
                                {{ $package->title }}
                            </div>
                            <div class="course_info">
                                <ul>
                                    <li><i class="far fa-eye"></i>9662 Views</li>
                                    <li><i class="far fa-clock"></i> 6h 40min </li>
                                    <li><i class="far fa-star"></i> 4.7 Reviews</li>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="view-more">
                    <a href="{{ route('package') }}">View More</a>
                </div>
            </div>
        </div>

        <div class="news_container">
            <div class="container">
                <div class="news_header">
                    News and Events
                </div>
                <div class="row">
                    @foreach ($newsAndEvents as $item)
                        <div class="col-md-4">
                            <div class="article_container">
                                <div class="image_container">
                                <a href="{{ route('newsAndEventSlug.single', $item->slug) }}">
                                        <img class="img-fluid" src="{{ $item->image }}" alt="{{ $item->title }}">
                                    </a>  
                                </div>
                                <div class="article_title">
                                    {{ $item->title }}
                                </div>
                                <!-- <div class="article_author">
                                    <div class="image_container">
                                        <img class="img-fluid" src="img/avatar1.jpg" alt="">
                                    </div>
                                    <div>
                                        Adam Willsone
                                    </div>
                                </div> -->
                            </div>
                        </div>   
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <!-- <div class="subscribe_us_container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8 col-lg-7">
                    <div class="subscribe_container">
                        <div class="subscribe_header">
                            <div>
                                Join Thousand of Happy Students!
                            </div>
                            <div>
                                Subscribe our newsletter & get latest news and updation!
                            </div>
                        </div>
                        <form  class="sup_form">
                            <input class="form-control" type="email" placeholder="Your Email Address" >
                            <div class="get_started_btn">
                                <a href="">Get Started</a>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="gradient"></div>
    </div> -->
   
    <div class="app-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title">
                        Get all your needs in one app
                    </div>
                    <div class="subtitle">
                        Available On
                    </div>
                    <div class="button-container">
                        <a href="" class="google-btn">
                            <img src="{{ asset('assets/img/android.png') }}" class="img-fluid" alt=""> Play Store
                        </a>
                        <a href="" class="apple-btn">
                            <img src="{{ asset('assets/img/apple.png') }}" class="img-fluid" alt=""> App Store
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="img-container">
                        <img src="{{ asset('assets/img/app-mockup.webp') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

