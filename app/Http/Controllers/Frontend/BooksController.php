<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Category;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('ID','DESC')
            ->where('status','Active')
            ->where('offer_price','>',0)
            ->paginate(12);

        $categories = Category::orderBy('ID', 'DESC')
        ->where('status', 'Active')
        ->where('parent_id', 0)
        ->get();

        $cats = [];
        foreach ( $categories as $category ) {
            $cats[] = Category::with('childs.childs')
            ->where('id', $category->id)
            ->get();
        }
        return view('frontend.book.index',compact('cats', 'books'))
            ->with('i', (request()->input('page', 1) - 1) * 12);
    }
    public function getBooksBySlug($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->type = 'book';
        $similarBooks = Book::orderBy('ID','DESC')
            ->where('category_id', $book->category_id)
            ->where('id', '!=' , $book->id)
            ->where('status','Active')
            ->take(3)
            ->get();
        return view('frontend.book.single', compact('book', 'similarBooks'));
    }
}
