<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Book;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Lent;

class PageController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $books = Book::paginate(6);
        $blog = Blog::first();

        $countCart = Cart::get()->count();
        return view('index', compact(
            'title',
            'books',
            'blog',
            'countCart'
        ));
    }

    public function books()
    {
        $title = 'Books';
        $books = Book::paginate(12);
        $blog = Blog::first();
        return view('pages.books', compact(
            'title',
            'books',
            'blog'
        ));
    }

    public function show($id)
    {
        $title = 'Book';
        $book = Book::where('id', $id)->first();
        $blog = Blog::first();
        return view('pages.book', compact(
            'title',
            'book',
            'blog'
        ));
    }

    public function cart(Request $request)
    {
        $title = 'Book';

        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
        ]);

        $date = Carbon::now();
        $duration = Carbon::now()->addDays($request->duration);

        $data = new Cart([
            'lent_at' => $date,
            'due_at' => $duration,
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
        ]);

        $data->save();

        return redirect('/carts/user/' . $request->user_id);
    }

    public function cartDetail($id)
    {
        $title = 'Cart';
        $blog = Blog::first();
        $carts = Cart::all();

        return view('pages.cart', compact(
            'title',
            'blog',
            'carts'
        ));
    }

    public function checkout(Request $request)
    {
        $status = 'unpaid';
        $amercement = 0;

        $data = new Lent([
            'lent_at' => $request->lent_at,
            'due_at' => $request->due_at,
            'price' => $request->price,
            'status' => $status,
            'amercement' => $amercement,
            'user_id' => $request->user_id,
            'book_id' => $request->book_id
        ]);
        $data->save();

        $book = Book::find($request->book_id);
        $book->stock -= 1;
        $book->save();

        Cart::where([
            ['user_id', $request->user_id],
            ['book_id', $request->book_id],
        ])->delete();

        return redirect('/checkout/user/' . $request->user_id);
    }

    public function checkoutDetail($id)
    {
        $title = 'Checkout';
        $blog = Blog::first();
        $lents = Lent::where('user_id', $id)->get();

        return view('pages.checkout', compact(
            'title',
            'blog',
            'lents'
        ));
    }
}
