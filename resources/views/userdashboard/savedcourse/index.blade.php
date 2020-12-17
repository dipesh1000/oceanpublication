@extends('frontend.layouts.app')
@section('content')
<div id="allcourses_page">
    <div class="row no-gutters">
        @include('userdashboard.partials.side-nav')
        <div class="col-md-8 col-lg-9">
            @include('userdashboard.partials.breadcum')
            <div class="course_container">  
                <div class="row">
                    <div class="col-lg-12">
                        <div class="allcourses-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    @if (count($courses) > 0)
                                    <div class="row">
                                        @foreach ($courses as $course)
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <div class="course-element">
                                                <div class="course-element-image">
                                                <img src="{{ $course->image }}" />
                                                </div>
                                                <div class="course-element-details">
                                                    <div class="course-element-title">
                                                        {{ $course->title }}
                                                    </div>
                                                    <div class="course-name-divider"></div>
                                                    <div class="course-element-subtitle">
                                                        {!! \Illuminate\Support\Str::limit($course->description, 150, '...') !!}
                                                    </div>
                                                    <div class="d-flex justify-content-between align-items-baseline">
                                                    <div class="course-element-price">{{ $course->offer_price }}</div>
                                                    @if($course->type == 'book')
                                                    <a href="{{ route('book.single', $course->slug) }}" class="btn-sm btn-primary">View</a>
                                                    @elseif($course->type == 'video')
                                                    <a href="{{ route('video.single', $course->slug) }}" class="btn-sm btn-primary">View</a>
                                                    @else
                                                    <a href="{{ route('package.single', $course->slug) }}" class="btn-sm btn-primary">View</a>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        @endforeach
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