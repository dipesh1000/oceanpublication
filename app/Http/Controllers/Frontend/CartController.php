<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('userdashboard.cart');
    }
    public function addToCart(Request $request, $id)
    {
        $course = Book::where('id', $id)->first();
        return $course;
    }
}
