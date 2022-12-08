<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Str;

use App\Author;
use App\Media;
use App\Book;
use App\Team;
use App\Category;

class MainController extends Controller
{
   public function index()
    {
         $sliders = Media::where(['media_type' => 'slider', 'status' => 'ACTIVE'])->get();
        $upcoming_books = Book::where('status', 'UPCOMING')->limit(5)->get();
        $galleries = Media::where(['media_type' => 'gallery', 'status' => 'ACTIVE'])->limit(6)->get();
        $author_feature = Author::where(['status' => 'ACTIVE', 'author_feature' => 'yes'])->inRandomOrder()->first();
        $books = Book::where('status', 'ACTIVE')->paginate(10);
        $recomended_books = Book::where('recomended', '1')->get();
        $downloaded_books = Book::orderBy('downloaded', 'DESC')->get();
        $categories = Category::where('status', 'ACTIVE')->get();
        return view('index')
        ->with(compact('categories', 'downloaded_books', 'recomended_books', 'books', 'author_feature', 'galleries', 'upcoming_books', 'sliders'));
    }

    public function about()
    {
        $teams = Team::where('status', 'ACTIVE')->get();
        return view('about')
        ->with(compact('teams'));
    }

    public function gallery()
    {
       $galleries = Media::where(['media_type' => 'gallery', 'status' => 'ACTIVE'])->paginate(8);
        return view('gallery')
        ->with(compact('galleries'));
    }

    public function blog()
    {
        return view('blog');
    }

    public function author()
    {
        $letter = request()->get('letter');
        $authors = Author::where('title', 'LIKE', "$letter%")->paginate(10);
        $downloaded_books = Book::orderBy('downloaded', 'DESC')->limit(4)->get();
        $author_features = Author::where('author_feature', 'yes')->limit(5)->get();
        return view('author')
        ->with(compact('authors', 'downloaded_books', 'author_features'));
    }

    public function author_detail($slug)
    {

       $author = Author::where('slug', $slug)->first();
        return view('author_detail')->with(compact('author'));
    }

    public function contact()
    {
        return view('contact');
    }
}
