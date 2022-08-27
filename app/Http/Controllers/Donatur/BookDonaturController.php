<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Image;

class BookDonaturController extends Controller
{
    public function index($id)
    {
        $books = Book::where('user_id', $id)->orderBy('updated_at', 'DESC')->paginate(5);
        $categories = Category::all();
        $blog = Blog::first();
        return view('donatur.books.index', compact(
            'books',
            'categories',
            'blog'
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

    public function edit($id)
    {
        $title = 'Donatur | Book';
        $bookDetail = Book::where('isbn', $id)->first();
        $categories = Category::all();
        $blog = Blog::first();

        return view('admin.books.edit', compact(
            'title',
            'bookDetail',
            'categories',
            'blog'
        ));
    }

    public function update(Request $request, $id)
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
            if (File::exists($destinationPath . $book->image)) {
                File::delete($destinationPath . $book->image);
            }

            $c['image'] = $filename;
        }

        Book::where('id', $id)->update($c);
        $data = Book::find($id);

        return redirect('/donatur/books/user/' . $data->user_id)->with('success', 'Book has been updated!');
    }

    public function destroy(Request $request, $id)
    {
        Book::find($id)->delete();
        $data = Book::withTrashed()->find($id);

        return redirect('/donatur/books/user/' . $data->user_id)->with('success', 'Book has been deleted!');
    }
}
