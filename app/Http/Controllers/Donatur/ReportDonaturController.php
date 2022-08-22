<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Blog;
use App\Models\Category;

class ReportDonaturController extends Controller
{
    public function index($id)
    {
        $title = 'Donatur | Report';
        $reports = Book::withTrashed()->where('user_id', $id)->paginate(5);
        $booksAmount = Book::withTrashed()->orderBy('price')->where('user_id', $id)->paginate(5);
        $categories = Category::all();
        $blog = Blog::first();
        return view('donatur.reports.index', compact(
            'title',
            'reports',
            'booksAmount',
            'categories',
            'blog'
        ));
    }
}
