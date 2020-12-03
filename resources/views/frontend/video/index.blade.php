@extends('frontend.layouts.app')
@section('content')
<div id="packages_page">
    <div class="our_package_container">
        <div class="container">
            <div class="our_package_header">
                Our Videos
            </div>
            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-md-3">
                        <div class="course_container">
                            <div class="image_container">
                                <a href="{{ route('video.single', $video->slug) }}">
                                <img class="img-fluid" src="{{ $video->image }}" alt="{{ $video->title }}">
                                </a>  
                                <div class="course_price">
                                    {{ $video->offer_price }}
                                </div>
                            </div>
                            <div class="course_title">
                                {{ $video->title }}
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
                {{ $videos->links() }}
           
        </div>
    </div>
  </div>
@endsection