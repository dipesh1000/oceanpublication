<div class="row">
    @foreach ($books as $book)
        <div class="col-md-3 col-6">
            <div class="book_list">
                <div class="book_img">
                    {{-- <span class="badge badge-primary">Book</span> --}}
                    <a href="{{ route('book.single', $book->slug) }}"><img class="img-fluid" src="{{ $book->image }}" alt=""></a>
                </div>
                <div class="book_description">
                    {{ $book->title }}
                </div>
                
                <div class="row">
                    <div class="col-md-7" style="align-self: center">
                        4.5 <i class="fa fa-star" style="color: orange"></i> Reviews
                    </div>
                    <div class="col-md-5">
                        <div class="rating"> 
                            <input type="radio" name="rating" value="5" id="5">
                            <label for="5" style="margin-bottom: .1rem; font-size: 1.5vw;">☆</label> 
                            <input type="radio" name="rating" value="4" id="4">
                            <label for="4" style="margin-bottom: .1rem; font-size: 1.5vw;">☆</label>
                            <input type="radio" name="rating" value="3" id="3">
                            <label for="3" style="margin-bottom: .1rem; font-size: 1.5vw;">☆</label> 
                            <input type="radio" name="rating" value="2" id="2">
                            <label for="2" style="margin-bottom: .1rem; font-size: 1.5vw;">☆</label> 
                            <input type="radio" name="rating" value="1" id="1">
                            <label for="1" style="margin-bottom: .1rem; font-size: 1.5vw;">☆</label>
                        </div>
                    </div>
                </div>

                {{-- <div class="row" style="height: 80px">
                    <div class="col-md-6">
                        <ul class="card-details">
                            <li>
                                <i class="fa fa-user"></i> <span>{{ $book->author }}</span>
                            </li>
                            <li>
                                <i class="fa fa-book"></i> <span>{{ $book->edition }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="card-details">
                            <li>
                                <i class="fa fa-file"></i> <span>{{ $book->digital_or_hardcopy }}</span>
                            </li>
                            <li>
                                <i class="fa fa-american-sign-language-interpreting"></i> <span>{{ $book->language }}</span>
                            </li>
                        </ul>
                    </div>
                </div> --}}

                <div class="book-nav">
                    <div class="book_price">
                        <div class="old-price">Rs {{ $book->price }}</div>
                        <div class="new-price">Rs {{ $book->offer_price }}</div>
                    </div>
                    <div class="book_button">    
                        <a class="btn_addcart" href="{{ route('book.single', $book->slug) }}"> <i class="fas fa-eye"></i> View</a>
                    </div>
                </div>
                
            </div>
        </div>                   
    @endforeach
</div>