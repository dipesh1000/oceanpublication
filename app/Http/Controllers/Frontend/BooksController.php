<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Repositories\BookRepo\BookRepository;

class BooksController extends Controller
{
    public $book;
    public function __construct(BookRepository $book) {
        $this->book = $book;
    }

    public function index()
    {
        $books = $this->book->getAllBooks();

        $cats = $this->book->getAllBooksCategory();
        
        return view('frontend.book.index',compact('cats', 'books'))
            ->with('i', (request()->input('page', 1) - 1) * 12);
    }
    public function getBooksBySlug($slug)
    {
        
        $book = $this->book->getBookBySlug($slug);

        // $courseReview = $book->courseItem;
        // return $courseReview;

        $similarBooks = $this->book->getSimilarBooks($slug);

        $child_cat = $this->book->getRelatedCategories($slug);

        return view('frontend.book.single', compact('book', 'similarBooks', 'child_cat'));
    }
}
