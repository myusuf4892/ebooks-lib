<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PageController extends Controller
{
    public function main()
    {
        $data['title'] = 'Home';
        $books = Book::all();
        return view('index', $data)->with('books', $books);
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
