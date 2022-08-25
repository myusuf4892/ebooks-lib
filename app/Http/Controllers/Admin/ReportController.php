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
        $reports = Lent::paginate(10);
        $booksAmount = Lent::orderBy('price')->sum('price');
        $amercement = Lent::orderBy('amercement')->sum('amercement');
        $total = $booksAmount + $amercement;
        $categories = Category::all();
        $blogs = Blog::first();
        return view('admin.reports.index', compact(
            'title',
            'reports',
            'booksAmount',
            'amercement',
            'total',
            'categories',
            'blogs'
        ));
    }
}
