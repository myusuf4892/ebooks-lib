<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;

class DonaturController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $blog = Blog::first();
        return view('donatur.index', compact(
            'title',
            'blog'
        ));
    }
}
