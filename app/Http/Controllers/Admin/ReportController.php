<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Lent;

class ReportController extends Controller
{
    public function index()
    {
        $title = 'Admin | Report';
        $reports = Book::withTrashed()->paginate(5);
        $booksAmount = Book::withTrashed()->orderBy('price')->paginate(5);
        $categories = Category::all();
        $blogs = Blog::first();
        return view('admin.reports.index', compact(
            'title',
            'reports',
            'booksAmount',
            'categories',
            'blogs'
        ));
    }
}
