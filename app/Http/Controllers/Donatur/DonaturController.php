<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\lent;

class DonaturController extends Controller
{
    public function index($id)
    {
        $title = 'Donatur | Dashboard';
        $amercement = Lent::withTrashed()->orderBy('amercement')->where('donatur_id', $id)->sum('amercement');
        $grossAmount = Lent::withTrashed()->orderBy('price')->where('donatur_id', $id)->sum('price') + $amercement;
        $netAmount = Lent::withTrashed()->where('payment_status', 'paid')->where('donatur_id', $id)->orderBy('price')->sum('price') + $amercement;

        $blog = Blog::first();
        return view('donatur.index', compact(
            'title',
            'blog',
            'amercement',
            'grossAmount',
            'netAmount'
        ));
    }
}
