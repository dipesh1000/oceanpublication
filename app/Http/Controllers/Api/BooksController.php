<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\BookRepo\BookRepository;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    use ResponseAPI;
    
    public $book;
    public function __construct(BookRepository $book) {
        $this->book = $book;
    }
    public function index()
    {
        $books = $this->book->getAllBooks();

        $cats = $this->book->getAllBooksCategory();
        
        // return $this->success("All Books", [$books, $cats]);
        return [$this->success("All Books", $books), $this->success('Books Categories', $cats)];
        
    }
}
