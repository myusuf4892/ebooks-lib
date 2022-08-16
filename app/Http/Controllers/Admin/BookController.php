<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\BookDetail;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function main()
    {
        $books = BookDetail::paginate(5);
        $categories = Category::all();
        return view('admin.books.index', compact(
            'books',
            'categories'
        ));
    }

    public function store(Request $request)
    {
        $c = $request->validate([
            'isbn' => 'required|unique:book_details',
            'image' =>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'donatur' => 'required',
            'category_id' => 'required'
        ]);

        if ($request->file('image')) {
            $c['image'] = $request->file('image')->move(public_path('images'));
        }

        $data = new BookDetail([
            'isbn' => $request->isbn,
            'image' => $request->image,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'donatur' => $request->donatur,
            'category_id' => $request->category_id,
        ]);

        $data->save();

        return back()->with('success', 'Success Add Book!');
    }
}
