@extends('frontend.layouts.app')
@section('content')
<div id="allcourses_page">
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
                        <span>My Orders</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            <div class="course_container">  
                <div class="row">
                    <div class="col-lg-12">
                        <div class="allcourses-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    
                                    @if (isset($users_order))
                                    <div class="row">
                                        @foreach ($users_order->myOrder as $order)
                                        
                                       
                                        @foreach($order->order as $key => $value)
                                    
                                        @if($value->orderItem)
                                        
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="course-element">
                                                <div class="course-element-image">
                                                    
                                                <img src="{{ $value->orderItem->image }}" />
                                                </div>
                                                <div class="course-element-details">
                                                    <div class="course-element-title">
                                                        <br>
                                                        
                                                        Rs.{{ $value->price }}
                                                    </div>
                                                    <div class="course-name-divider"></div>

                                                    <div class="course-element-subtitle">
                                                        {{-- {!! substr(strip_tags($course->description), 0 , 150) !!} --}}
                                                        {{$order->invoice_no}}
                                                        <br>
                                                        {{$order->payment_method}}
                                                        <br>
                                                        @if($order->status == 1)
                                                        Paid
                                                        @else
                                                        Not Paid
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-baseline">
                                                    {{-- <div class="course-element-price">Rs. {{ $course->offer_price }}</div> --}}
                                                    {{-- @if($course->type == 'book')
                                                    <a href="{{ route('book.single', $course->slug) }}" class="btn-sm btn-primary">View</a>
                                                    @elseif($course->type == 'video')
                                                    <a href="{{ route('video.single', $course->slug) }}" class="btn-sm btn-primary">View</a>
                                                    @else
                                                    <a href="{{ route('package.single', $course->slug) }}" class="btn-sm btn-primary">View</a>
                                                    @endif --}}
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <a href="{{ route('saveCourseLater.delete', $course->id) }}">Remove</a> --}}
                                        </div> 
                                        @endif
                                        @endforeach
                                        
                                  
                                     
                                        @endforeach
                                    </div>
                                    @else
                                        <div>
                                            <p>Your Order are Empty</p>
                                            <h1>Order From <a href="{{ route('getAllBooks') }}" class="btn btn-outline-primary">Books</a></h1>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection