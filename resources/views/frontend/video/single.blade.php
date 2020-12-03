@extends('frontend.layouts.app')
@section('content')
{{-- {{ dd($pack) }} --}}
<div id="single_page">
    <!-- <div class="banner_container">
        <div class="text_container">
            <div>
                Introduction to Math 
            </div>
            <div>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda mollitia praesentium necessitatibus quo asperiores.
            </div>
            <div>
                <a href="">
                    Start Course
                </a>
            </div>
            
        </div>
        <div class="background_gradient"></div>
        <div class="background_image_container"></div>

    </div> -->

    <div class="detail_header_container">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="image_container">
                        <img class="img-fluid" src="{{ $video->image }}" alt="{{ $video->title }}">
                    </div>
                </div>
                <div id="player"></div>
                <div class="col-md-8">
                    <div class="course_detail_container">
                        <div class="header">
                            {{ $video->title }}
                        </div>
                        <div class="description">
                            {!! $video->description !!}
                        </div>
                        <div class="review">
                            <i class="far fa-star"></i> <span>4.7 Reviews</span> 
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-play-circle" aria-hidden="true"></i> Play Video
                              </button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="course_container">

    <div class="container">
        {{-- <div class="row">

            <div class="col-md-8">
                <div class="course_content_container">
                    <div class="course_content_header">
                        Course Content
                    </div>
                    <div class="course_module_container">

                        <div class="module_header">
                            Module 1: Introduction
                        </div>
                        <div class="module_list">
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Introduction
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                        </div>
                       
                        <div class="module_header">
                            Module 1: Introduction
                        </div>
                        <div class="module_list">
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Introduction
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="module_header">
                            Module 1: Introduction
                        </div>
                        <div class="module_list">
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Introduction
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="">
                                    <div>
                                        <i class="fas fa-video"></i>Intro to chapter 1
                                    </div>
                                    <div>
                                        4m    
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
    
                <div class="course_content_container">
                    <div class="course_content_header">
                        Course Description
                    </div>
                    <div class="course_module_container">
                        <div class="course_description_container">
                            <div>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                 Reiciendis iure maiores porro aperiam at maxime atque error 
                                aliquid provident perspiciatis ipsum quidem sed eos, qui vel nulla velit architecto dolorum. 
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis eveniet impedit, nihil dolore similique qui 
                                consectetur illo tempora ducimus delectus itaque! 
                                Placeat delectus soluta eveniet voluptatem ipsum corrupti nesciunt voluptatibus!
                            </div>
                                <br>
                            <div>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora laudantium rem expedita dolorum id 
                                voluptatibus dolorem, ipsa velit, optio quasi libero quae sequi corrupti quas aliquam porro ullam, ea facilis.
                            </div>
                        </div>

                            <br>
                        
                            <div class="course_description_container">
                                <div class="description_question">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit?
                                </div>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates autem quo voluptatum
                                     eum, earum iusto cum. Earum cum laborum qui quisquam, quis veritatis. Necessitatibus dicta 
                                     sed, corrupti labore ex laborum.
                                </div>
                                <br>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates autem quo voluptatum
                                     eum, earum iusto cum. Earum cum laborum qui quisquam, quis veritatis. Necessitatibus dicta 
                                     sed, corrupti labore ex laborum.
                                </div>

                            </div>
                            <br>
                        
                            <div class="course_description_container">
                                <div class="description_question">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit?
                                </div>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates autem quo voluptatum
                                     eum, earum iusto cum. Earum cum laborum qui quisquam, quis veritatis. Necessitatibus dicta 
                                     sed, corrupti labore ex laborum.
                                </div>
                                <br>
                                <div>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates autem quo voluptatum
                                     eum, earum iusto cum. Earum cum laborum qui quisquam, quis veritatis. Necessitatibus dicta 
                                     sed, corrupti labore ex laborum.
                                </div>

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
                                    Michael Russell
                                </div>
                            </div>

                            <div class="price_container">
                               <span>
                                Actual Price
                               </span>
                               <div>
                                $ 69.00
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
                                <a href="">
                                    Enroll Now <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                           
                        </div>

                    <div class="course_content_header">
                        Provided By
                    </div>

                    <a href="">
                        <div class="course_module_side_container">
                            <div class="side_container_logo">
                                <img src="img/logo.png" alt="…"> Ocean Publication
                            </div>
                            
                        </div>
                    </a>
                    
                </div>

            </div>

        </div> --}}
        @if(count($similarVideos) > 0)
        <div class="similar_content_header">
            Similar Content
        </div>
        <div class="row">
            @foreach ($similarVideos as $item)
                <div class="col-md-4">
                    <div class="similar_content_container">
                    <a href="{{ route('video.single', $item->slug) }}">
                            <div class="image_container">
                            <img class="img-fluid" src="{{ $item->image }}" alt="{{ $item->title }}">
                            </div>
                            <div class="text_container">
                                <div class="text_container_header">
                                    {{ $item->title }}
                                </div>
                                <div class="text_container_para">
                                    {!! \Illuminate\Support\Str::limit($item->description, 150, '...') !!}
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

  
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
        <div style="position:relative; overflow:hidden; padding-bottom:56.25%"> <iframe src="https://cdn.jwplayer.com/players/{{$video->video}}-Fy9ggf0s.html" width="100%" height="100%" frameborder="0" scrolling="auto" title="Test Video" style="position:absolute;" allowfullscreen></iframe> </div>
        </div>
      </div>
    </div>
  </div>

@endsection
