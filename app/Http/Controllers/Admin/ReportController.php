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
        $blog = Blog::first();

        return view('admin.reports.index', compact(
            'title',
            'reports',
            'booksAmount',
            'amercement',
            'total',
            'categories',
            'blog'
        ));
    }

    public function bookReturned($id)
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        $lent = Lent::withTrashed()->find($id);
        $lent->update([
            'return_at' => $date,
        ]);
        
        $due = Carbon::parse($lent->due_at);
        $returned = Carbon::parse($lent->return_at);
        $days = $returned->diffInDays($due);
        $amercement = $days*5000;
        
        if (strtotime($returned) < strtotime($due)) {
          $lent->update([
            'amercement' => 0,
            'status_returned' => 'already borrowed',
          ]);
        } else {
          $lent->update([
            'amercement' => $amercement,
            'status_returned' => 'already borrowed',
          ]);
        }
        
        $report = Lent::withTrashed()->find($id);
        $book = Book::withTrashed()->find($report->book_id);
        $book->stock += 1;
        $book->save();

        return back()->with('success', 'Book has been returned!');
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
