@extends('frontend.layouts.app')
@section('content')
<div id="product_page">
    <div class="container-fluid book_filter">
       <div class="filter_title" data-toggle="collapse" data-target="#filter_list">
           <a><i class="fas fa-filter"></i>Book Filter</a>
       </div>
 
   <div class="collapse" id="filter_list"> 
     <aside>
               <div class="aside_header">
                   Categories
               </div>
               
               @foreach ($cats as $cat)
                    @foreach ($cat as $catItem)
                    <div class="aside_drop" data-toggle="collapse" data-target="#drop2">
                        <span>{{ $catItem->title }}</span> 
                        <span>&blacktriangledown;</span>
                    </div>
                    <div class="collapse" id="drop2"> 
                        <div class="aside_list">
                        <a href="">
                            Textbooks
                        </a> 
                        </div>
                    </div>
                    @endforeach
               @endforeach
           </aside>
   </div>
</div>


<div class="container-fluid">
   <div class="row">

       <div class="col-2 asider">
           <aside>
               <div class="aside_header">
                   Categories
               </div>
                @foreach ($cats as $cat)
                    @foreach ($cat as $catItem)
                    <div class="aside_drop" data-toggle="collapse" data-target="#drop{{ $catItem->id }}">
                        <li id="cat{{$catItem->id}}" class="selectCategory" value="{{$catItem->id}}">{{ $catItem->title }}</li> 
                        <span>&blacktriangledown;</span>
                    </div>
                    @if($catItem->childs)
                        @foreach ($catItem->childs as $child_cats)
                            <div class="collapse" id="drop{{ $catItem->id }}"> 
                                <div class="aside_list" data-toggle="collapse" data-target="#drop{{ $child_cats->id }}">
                                    <li id="cat{{$child_cats->id}}" class="selectCategory" value="{{$child_cats->id}}">
                                        {{ $child_cats->title }}
                                    </li> 
                                </div>
                            </div>
                            @if($child_cats->childs)
                                @foreach ($child_cats->childs as $child_cat)
                                <div class="collapse" id="drop{{ $child_cats->id }}"> 
                                    <div class="aside_list">
                                        <li id="cat{{$catItem->id}}" class="selectCategory" value="{{$child_cat->id}}">
                                            {{ $child_cat->title }}
                                        </li> 
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                    @endforeach
                @endforeach
           </aside>
       </div>

       <div class="col-12  col-md-10">
           <main>
                <div class="bread_container">
                    <ul class="bread">
                        <li><a href=""> <i class="fa fa-home"></i> Home &gt; </a></li>
                        <li><a href="">Engineering Entrances &gt;</a></li>
                        <li><a href="">JEE Main And Advanced </a></li>
                    </ul>
                </div>

                <div id="booksData">
                    @include('frontend.book.books')
                </div>

                <nav aria-label="Page navigation example">
                   <ul class="pagination">
                   <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                   <li class="page-item"><a class="page-link" href="#">1</a></li>
                   <li class="page-item"><a class="page-link" href="#">2</a></li>
                   <li class="page-item"><a class="page-link" href="#">3</a></li>
                   <li class="page-item"><a class="page-link" href="#">Next</a></li>
                   </ul>
                </nav>
           </main>
       </div>

   </div>
</div>
</div>
@endsection
@push('scripts')
<script>
    $(function( $ ){
        $(".selectCategory").click(function(){
            var cat = $(this).val();
            console.log(cat)
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: "{{ url('/bookByCat') }}",
                data: 'cat_id='+cat,
                success: function(response){
                    console.log(response)
                    $("#booksData").html(response);
                }
            });
        }); 
    });
</script>
@endpush
