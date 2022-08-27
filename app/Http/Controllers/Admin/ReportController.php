<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Lent;

use Carbon\Carbon;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $title = 'Admin | Report';
        $reports = Lent::withTrashed()->orderBy('updated_at', 'DESC')->paginate(10);
        $booksAmount = Lent::withTrashed()->orderBy('price')->sum('price');
        $amercement = Lent::withTrashed()->orderBy('amercement')->sum('amercement');
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

    public function bookReturned($id)
    {
        $status = 'already borrowed';
        $lent = Lent::withTrashed()->find($id)->update([
            'status_returned' => $status,
        ]);

        $report = Lent::withTrashed()->find($id);
        $book = Book::withTrashed()->find($report->book_id);
        $book->stock += 1;
        $book->save();

        return back()->with('success', 'stock book has been updated!');
    }

    public function printPdf()
    {
        $reports = Lent::withTrashed()->orderBy('updated_at', 'DESC')->paginate(10);
        $booksAmount = Lent::withTrashed()->orderBy('price')->sum('price');
        $amercement = Lent::withTrashed()->orderBy('amercement')->sum('amercement');
        $total = $booksAmount + $amercement;

        $pdf = PDF::loadview('partials.reports.printPdf', compact(
            'reports',
            'booksAmount',
            'amercement',
            'total',
        ));
        return $pdf->stream();
    }
}
