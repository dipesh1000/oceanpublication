@extends('frontend.layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
<div id="single_page">
    <div class="detail_header_container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="image_container">
                        <img class="img-fluid" src="{{ $book->image }}" alt="{{ $book->title }}">
                    </div>
                </div>
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
                        Course Description
                    </div>
                    <div class="course_module_container">
                        <div class="course_description_container">
                            {!! $book->description !!}
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="course_content_container">

                    <div class="course_content_header">
                        Course Details
                    </div>

                        <div class="course_module_side_container">

                            <div class="author_container">
                                <div class="image_container"> 
                                    <img class="img-fluid" src="img/avatar.jpg" alt="">
                                </div>
                                <div class="author_box">
                                    {{ $book->author }}
                                </div>
                            </div>

                            <div class="price_container">
                               <span>
                                Actual Price
                               </span>
                               <div>
                                    Rs. {{ $book->offer_price }}
                               </div>
                            </div>
                            <div class="course_features">
                                <span>Course Features</span>
                                <ul>
                                    <li><i class="fas fa-angle-right"></i>Fully Programming</li>
                                    <li><i class="fas fa-angle-right"></i>Fully Programming</li>
                                    <li><i class="fas fa-angle-right"></i>Unlimited Videos</li>
                                    <li><i class="fas fa-angle-right"></i>24x7 Support</li>
                                </ul>
                            </div>
                            <div class="enroll_btn">
                                <a href="javascript:void(0)" class="addtocart" data-course="{{ $book->id }}">
                                        Add To Cart <i class="fas fa-angle-right"></i>
                                </a>
                                <a href="javascript:void(0)" class="cart-remove-from-cart-button save-course-later" course-id="{{ $book->id }}">
                                    Save For Later<i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                           
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
        @if(count($similarBooks) > 0)
            <div class="similar_content_header">
                Similar Content
            </div>  
            <div class="row">
                @foreach ($similarBooks as $item)
                    <div class="col-md-4">
                        <div class="similar_content_container">
                            <a href="">
                                <div class="image_container">
                                <img class="img-fluid" src="{{ $item->image }}" alt="">
                                </div>
                                <div class="text_container">
                                    <div class="text_container_header">
                                        {{ $item->title }}
                                    </div>
                                    <div class="text_container_para">
                                        {!! \Illuminate\Support\Str::limit($item->description, 150, '...') !!}
                                        {{-- {!! $item->description !!} --}}
                                    </div>
                                </div>
                            </a>
                        
                        </div>
                    </div>          
                @endforeach
            </div>
        @endif
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
                    location.reload();
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
        $(document).on("click", ".addtocart", function (e) {
            // alert('here');
            e.preventDefault();
            var $this = $(this);
            var course = $this.attr('data-course');
            var type = 'book';
            quantity = 1;
             
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                postType: 'html',
                url: "{{ route('addToCart') }}",
                data: {
                    course: course,
                    type: type,
                    quantity: quantity
                },
                beforeSend: function (data) {
                    $this.button('loading')
                },
                success: function(data){
                    if (data.status) {
                    $('.alert-message.alert-danger').fadeOut();

                    var message = '<div><span><strong><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Success!</strong> ';
                    message += data.message;
                    message += '</span><a href="{{ route('cart') }}" class="btn btn-xs btn-primary pull-right">View cart</a></div>';

                    $('.alert-message.alert-success').html(message).fadeIn().delay(3000).fadeOut('slow');

                    sweetAlert('success', 'Success', data.message + '<a href="{{ route('cart') }}"> View Cart</a>');
                }

                UpdateMiniCart();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    sweetAlert('error', 'Oops...', 'Something went wrong!');
                },
                complete: function () {
                    $this.button('reset');
                    //$("html, body").animate({scrollTop: 0}, "slow");
                }
            });
        });
     //Save Course For Later
     $(document).on("click", ".save-course-later", function (e) {
            e.preventDefault();
            var $this = $(this);
            var courseId = $this.attr('course-id');
            var name = 'book';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('saveCourseLater.store')  }}",
                data: {
                  courseId: courseId,
                  name: name
                },
                // beforeSend: function () {
                //     $this.prop('disabled', true);
                // },
                success: function (data) {
                  if (data.status == 'login') {
                    window.location.replace('{{ route('login') }}');
                  }
                  if (data.status == 'exists'){
                    swal(data.status, data.message, "error");
                  }
                  else{
                    swal(data.status, data.message, "success");
                  }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(thrownError);
                },
                complete: function () {
                    // location.reload();
                }
            });

        });    
</script>
@endpush

