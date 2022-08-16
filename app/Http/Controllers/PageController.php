<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main()
    {
        $data['title'] = 'Home';
        return view('main', $data);
    }
    public function book()
    {
        $data['title'] = 'Book';
        return view('pages.book', $data);
    }
    public function about()
    {
        $data['title'] = 'About';
        return view('pages.about', $data);
    }
}
