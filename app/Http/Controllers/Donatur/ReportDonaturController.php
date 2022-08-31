<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

use App\Models\Lent;
use App\Models\Blog;

class ReportDonaturController extends Controller
{
    public function index($id)
    {
        $title = 'Donatur | Report';
        $reports = Lent::withTrashed()->where('donatur_id', $id)->paginate(10);
        $booksAmount = Lent::withTrashed()->orderBy('price')->where('donatur_id', $id)->sum('price');
        $amercement = Lent::withTrashed()->orderBy('amercement')->where('donatur_id', $id)->sum('amercement');
        $total = $booksAmount + $amercement;
        $blog = Blog::first();
        return view('donatur.reports.index', compact(
            'title',
            'reports',
            'booksAmount',
            'amercement',
            'total',
            'blog'
        ));
    }
}