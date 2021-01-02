<?php 

namespace App\Repositories\BookRepo;

use App\Model\Book;
use App\Model\Category;

class  BookRepository implements BookInterface {

    public function getAllBooks()
    {
        try {
            $books = Book::orderBy('ID','DESC')
            ->where('status','Active')
            ->where('offer_price','>',0)
            ->paginate(12);

            return $books;
            
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }
    public function getAllBooksCategory()
    {
        try {
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
            return $cats;
            
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function getBookBySlug($slug)
    {
        try {
            $book = Book::where('slug', $slug)->first();
            $book->type = 'book';
            
            return $book;
        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
        
    }

    public function getRelatedCategories($slug)
    {
        try {
            $book = Book::where('slug', $slug)->first();
            $current_cat = $book->category()->first();
            $parent_cat = $current_cat->parent()->first();
            $child_cat = Category::with('childs.childs')
                ->where('id', $parent_cat->id)
                ->first();
            
            return $child_cat;

        } catch (\Exception $e) {
            return redirect()->back()->with($e->getMessage());
        }
    }

    public function getSimilarBooks($slug)
    {
        try {
            $book = Book::where('slug', $slug)->first();

            $similarBooks = Book::orderBy('ID','DESC')
            ->where('category_id', $book->category_id)
            ->where('id', '!=' , $book->id)
            ->where('status','Active')
            ->take(3)
            ->get();

            return $similarBooks;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}