@extends('frontend.layouts.app')
@section('content')
<div id="packages_page">
    <div class="our_package_container">
        <div class="container">
            <div class="our_package_header">
                Our Books
            </div>
            <div class="row">
                @foreach ($books as $book)
                {{-- {{dd($books)}} --}}
                    <div class="col-md-3">
                        <div class="course_container">
                            <div class="image_container">
                                <a href="{{ route('book.single', $book->slug) }}">
                                <img class="img-fluid" src="{{ $book->image }}" alt="{{ $book->title }}">
                                </a>  
                                <div class="course_price">
                                    {{ $book->offer_price }}
                                </div>
                            </div>
                            <div class="course_title">
                                {{ $book->title }}
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
            {{ $books->links() }}
        </div>
    </div>
  </div>
@endsection