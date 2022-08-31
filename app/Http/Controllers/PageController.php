<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;
use Carbon\Carbon;

use App\Models\Book;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Lent;
use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $books = Book::where('status', 'verified')->paginate(6);
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
        $books = Book::where('status', 'verified')->paginate(12);
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
        $carts = Cart::where('user_id', $id)->get();

        return view('pages.cart', compact(
            'title',
            'blog',
            'carts',
        ));
    }

    public function confirmCheckout($id)
    {
        $title = 'Checkout | Confirmation';
        $blog = Blog::first();
        $cart = Cart::where('id', $id)->first();
        $userID = $cart->user->id;

        $lent = Lent::withTrashed()->where('user_id', $userID)->where('status_returned', 'still borrowed')->first();
        
        if ($lent == null) {
          return view('pages.confirmCheckout', compact(
            'title',
            'blog',
            'cart'
          ));
        }
        
        $lentID = Lent::withTrashed()->find($lent->id);
        $status = $lentID->status_returned;
  
        if ($status == 'still borrowed') {
            return redirect('/carts/user/' . $userID)->with('error', 'user can only borrow one book!');
        }
    }

    public function checkout(Request $request)
    {
        $dateOrder = Carbon::now()->format('YmdHis');
        $orderID = 'Book-'.$dateOrder.$request->book_id;

        $user = User::where('id', $request->user_id)->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-_26PB3W2v0tpbI9zL1TEHvYx';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $orderID,
                'gross_amount' => $request->price,
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $statusReturned = 'still borrowed';
        $paymentStatus = 'unpaid';
        $amercement = 0;

        $data = new Lent([
            'order_id' => $orderID,
            'lent_at' => $request->lent_at,
            'due_at' => $request->due_at,
            'price' => $request->price,
            'status_returned' => $statusReturned,
            'payment_status' => $paymentStatus,
            'amercement' => $amercement,
            'province' => $request->province,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'street' => $request->street,
            'snap_token' => $snapToken,
            'donatur_id' => $request->donatur_id,
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

    public function payment(Request $request)
    {
        $json = json_decode($request->get('json'));

        $status = 'pending';

        Lent::find($request->id)->update(['payment_status' => $status]);

        return back();
    }

    public function confirmPayment(Request $request)
    {
        $status = 'paid';

        Lent::find($request->id)->update(['payment_status' => $status]);
        Lent::find($request->id)->delete();

        return back()->with('success', 'Payment Success!');
    }

    public function historyPayment($id)
    {
        $title = 'History';
        $blog = Blog::first();
        $data = Lent::withTrashed()->where('user_id', $id)->orderBy('updated_at', 'DESC')->paginate(5);

        return view('pages.history', compact(
            'title',
            'blog',
            'data'
        ));
    }

    public function returned($id)
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');

        Lent::withTrashed()->find($id)->update(['return_at' => $date]);

        return Back()->with('success', 'book success returned!');
    }
}
