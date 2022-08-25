<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Category;
use App\Models\Book;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Image;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('updated_at', 'DESC')->paginate(5);
        $categories = Category::all();
        $blogs = Blog::first();
        return view('admin.books.index', compact(
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
            $image = $request->file('image');
            $today = Carbon::now()->format('Y-m-dH:i:s');
            $filename = $today.'.'.$image->extension();

            $destinationPath = public_path('images'.'/');
            $img = Image::make($image->path());
            $img->resize(183, 275, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($destinationPath . $filename);
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

    public function verification(Request $request)
    {
        $id = $request->isbn;
        $status = $request->status;

        if($status == 'rejected'){
            $c['status'] = $status;
            Book::where('isbn', $id)->update($c);
        }
        $c['status'] = $status;
        Book::where('isbn', $id)->update($c);

        return redirect('/admin/books');
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

    public function update(Request $request, $id)
    {
        $c = $request->validate([
            'isbn' => 'required',
            'image' =>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'category_id' => 'required'
        ]);
        $imgSize = File::size($request->file('image'));
        if ($imgSize == null) {
            $book = Book::where('id', $id)->first();
            $c['image'] = $book->image;
        }
        if ($imgSize != null) {
            $image = $request->file('image');
            $today = Carbon::now()->format('Y-m-dH:i:s');
            $filename = $today.'.'.$image->extension();

            $destinationPath = public_path('images'.'/');
            $img = Image::make($image->path());
            $img->resize(183, 275, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save($destinationPath . $filename);
            $book = Book::where('id', $id)->first();
            $c['image'] = $filename;
            $c['user_id'] = $book->user_id;
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
