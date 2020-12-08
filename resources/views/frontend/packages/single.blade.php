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
                        <img class="img-fluid" src="{{ $pack->image }}" alt="{{ $pack->title }}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="course_detail_container">
                        <div class="header">
                            {{ $pack->title }}
                        </div>
                        <div class="description">
                            {!! $pack->description !!}
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
                        Books & Course Content
                    </div>
                    <div class="course_module_container">
                        @foreach ($books as $book)
                            <div class="module_header">
                                Book : {{ $book->title }}
                            </div>
                            <div class="module_list">
                                <div>
                                    <a href="">
                                        <div>
                                            {!! $book->description !!}
                                        </div>
                                        {{-- <div>
                                            4m    
                                        </div> --}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
                                   Hari Magar
                                </div>
                            </div>

                            <div class="price_container">
                               <span>
                                Actual Price
                               </span>
                               <div>
                                    Rs. {{ $pack->offer_price }}
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

        </div>

        <div class="similar_content_header">
            Similar Content
        </div>

        <div class="row">
            
            <div class="col-md-4">
                <div class="similar_content_container">
                    <a href="">
                        <div class="image_container">
                            <img class="img-fluid" src="img/pic2.jpg" alt="">
                        </div>
                        <div class="text_container">
                            <div class="text_container_header">
                                Intro to Science
                            </div>
                            <div class="text_container_para">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                 elit. Libero unde esse velit fugiat vero nemo ...
                            </div>
                        </div>
                    </a>
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="similar_content_container">
                    <a href="">
                        <div class="image_container">
                            <img src="img/pic2.jpg" alt="">
                        </div>
                        <div class="text_container">
                            <div class="text_container_header">
                                Intro to Science
                            </div>
                            <div class="text_container_para">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                 elit. Libero unde esse velit fugiat vero nemo ...
                            </div>
                        </div>
                    </a>
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="similar_content_container">
                    <a href="">
                        <div class="image_container">
                            <img src="img/pic2.jpg" alt="">
                        </div>
                        <div class="text_container">
                            <div class="text_container_header">
                                Intro to Science
                            </div>
                            <div class="text_container_para">
                                Lorem ipsum dolor sit amet consectetur adipisicing
                                 elit. Libero unde esse velit fugiat vero nemo ...
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