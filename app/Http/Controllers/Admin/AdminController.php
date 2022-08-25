<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Blog;
use App\Models\Lent;

class AdminController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $dataUser = DB::table('users')->get();
        $grossAmount = Lent::orderBy('price');
        $netAmount = Lent::where('status', 'paid')->orderBy('price');

        $countUser = $dataUser->count();
        $blogs = Blog::first();
        return view('admin.index', compact(
            'dataUser',
            'countUser',
            'grossAmount',
            'netAmount',
            'blogs'
        ));
    }

    public function setting(Request $request, $id)
    {
        $c = $request->validate([
            'brand' => 'required',
            'linkedIn' => 'required',
            'contact' => 'required|nullable',
            'created_by' => 'required'
        ]);

        Blog::where('id', $id)->update($c);

        return redirect('/admin')->with('success', 'Setting has been Updated!');
    }
}
