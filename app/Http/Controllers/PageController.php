<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Blog;

class PageController extends Controller
{
    public function main()
    {
        $title = 'Home';
        $books = Book::paginate(6);
        $blog = Blog::first();
        return view('index', compact(
            'title',
            'books',
            'blog'
        ));
    }
    public function book()
    {
        $books = Book::all();
        $data['title'] = 'Book';
        return view('pages.book', $data)->with(
            'books', $books
        );
    }
    public function about()
    {
        $data['title'] = 'About';
        return view('pages.about', $data);
    }
}
