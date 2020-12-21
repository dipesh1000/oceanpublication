@extends('frontend.layouts.app')
@section('content')
<div id="single_page">
    <div class="detail_header_container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="image_container">
                        <img class="img-fluid" src="{{ $book->image }}" alt="{{ $book->title }}">
                    </div>
                    <div class="p-5 text-right">
                        <div class="_df_button" source="{{ $book->book }}"> Read Book</div>
                    </div>
                </div>
                <div id="player"></div>
                <div class="col-md-8">
                    <div class="course_detail_container">
                        <div class="header">
                            {{ $book->title }}
                        </div>
                        <div class="description">
                            {!! $book->description !!}
                        </div>
                        <div class="review">
                            <i class="far fa-star"></i> <span>4.7 Reviews</span> 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="course_container">

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="course_content_container">
                    <div class="course_content_header">
                        Table Of Content
                    </div>
                    <div class="course_module_container">

                        <div class="module_header">
                            {!! $book->table_of_content !!}
                        </div>
                    </div>
                </div>
    
                <div class="course_content_container">
                    <div class="course_content_header">
                        Course Description
                    </div>
                    <div class="course_module_container">
                        <div class="course_description_container">
                        <div>{!! $book->description !!}</div>
                        </div>                      
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="course_content_container">

                    <div class="course_content_header">
                        Feed Back
                    </div>
                        <div class="course_module_side_container">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <p class="text-center font-weight-bold pt-2">Please give us your feedback</p>
                            <form action="{{ route('feedback.store') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="courseId" value="{{ $book->id }}">
                                <input type="hidden" name="name" value="{{ $book->type }}">
                                <div class="rating"> 
                                    <input type="radio" name="rating" value="5" id="5">
                                    <label for="5">☆</label> 
                                    <input type="radio" name="rating" value="4" id="4">
                                    <label for="4">☆</label>
                                    <input type="radio" name="rating" value="3" id="3">
                                    <label for="3">☆</label> 
                                    <input type="radio" name="rating" value="2" id="2">
                                    <label for="2">☆</label> 
                                    <input type="radio" name="rating" value="1" id="1">
                                    <label for="1">☆</label>
                                </div>
                                <div class="p-2">
                                    <textarea name="review" id="review" class="form-control" required></textarea>
                                </div>
                                <div class="p-2 text-right">
                                    <button type="submit" value="submit" class="btn-sm btn-outline-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    <div class="course_content_header">
                        Provided By
                    </div>

                    <a href="">
                        <div class="course_module_side_container">
                            <div class="side_container_logo">
                                <img src="{{ getSiteSetting('logo') ?? '' }}" alt="…"> Ocean Publication
                            </div>
                            
                        </div>
                    </a>
                    
                </div>

            </div>

        </div>
    </div>


    </div>


</div>



@endsection
@push('scripts')
<script type="text/javascript">
        function UpdateMiniCart() {
            $.ajax({
                type: "GET",
                url: "{{ route('cart.mini')  }}",
                beforeSend: function (data) {
                    //
                },
                success: function (data) {
                    $('#mini-cart').html(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //
                },
                complete: function () {
                    //
                }
            });
            }
        function sweetAlert(type, title, message) {
            swal({
                title: title,
                html: message,
                type: type,
                confirmButtonColor: '#ee3d43',
                timer: 20000
            }).catch(swal.noop);
        }
       
    
</script>
@endpush
