<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $categoryId = $book->category_id;
        
       $relatedProducts = Book::where('category_id',$categoryId)->where('id','!=',$book->id)->limit(3)->get();
        return view('book/detail')->with(compact('book','relatedProducts'));   
    }
}
