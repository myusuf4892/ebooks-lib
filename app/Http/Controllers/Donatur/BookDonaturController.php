<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookDonaturController extends Controller
{
    public function main($id)
    {
        $books = Book::where('user_id', $id)->paginate(5);
        $categories = Category::all();
        $blogs = Blog::first();
        return view('donatur.books.index', compact(
            'books',
            'categories',
            'blogs'
        ));
    }

    public function store(Request $request)
    {
        $c = $request->validate([
            'isbn' => 'required|unique:books',
            'image' =>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'user_id' => 'required',
            'category_id' => 'required'
        ]);

        if ($request->file('image')) {
            $today = Carbon::now()->format('Y-m-dH:i:s');
            $filename = $today.$request->file('image')->getClientOriginalName();
            $c['image'] = $request->file('image')->storeAs('images', $filename);
        }

        $c['status'] = 'verification';

        $data = new Book([
            'isbn' => $request->isbn,
            'image' => $filename,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $c['status'],
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        $data->save();

        return back()->with('success', 'Success Add Book!');
    }

    public function edit($id)
    {
        $title = 'Admin | Book';
        $bookDetail = Book::where('isbn', $id)->first();
        $categories = Category::all();
        $blogs = Blog::first();

        return view('admin.books.edit', compact(
            'title',
            'bookDetail',
            'categories',
            'blogs'
        ));
    }

    public function update(Request $request, Book $book, $id)
    {
        $c = $request->validate([
            'isbn' => 'required|unique:books',
            'image' =>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'category_id' => 'required'
        ]);

        if ($request->file('image')) {
            $today = Carbon::now()->format('Y-m-dH:i:s');
            $filename = $today.$request->file('image')->getClientOriginalName();
            $c['image'] = $request->file('image')->storeAs('images', $filename);
        }
        $image_path = $book->image();
        if (Book::exists($image_path)) {
            Book::delete($image_path);
        }

        if ($request->file('image')->getSize() == 0) {
            $c['image'] = Book::get(['image'])->where('id', $id);
        }

        Book::where('id', $id)->update($c);

        return redirect('/admin/books')->with('success', 'Book has been updated!');
    }

    public function destroy(Request $request, $id)
    {
        Book::where('id', $id)->delete();

        return redirect('/admin/books')->with('success', 'Book has been deleted!');
    }
}
