@extends('layouts.main')

@section('title', 'Book')

@section('content')
    <section id="about" class="about">
        @auth()
            @if (Auth::user()->role->id == 3)
                <header class="section-header">
                    <h3>Cart</h3>
                    <hr>
                </header>
                <div class="container">
                    @foreach ($carts as $cart)
                        <div class="row mb-3">
                            <div class="col-4 col-sm-2 col-md-4 col-lg-3">
                                <img src="{{ asset('images/' . $cart->book->image) }}" class="img-fluid">
                            </div>
                            <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                                <h4>{{ $cart->book->title }}</h4>
                                <span>Lent {{ $cart->lent_at }}</span><br>
                                <span>Due {{ $cart->due_at }}</span><br><br>
                                <span>Member {{ $cart->user->name }}</span>
                            </div>
                            <div class="col-4 col-md-4 col-md-2 col-lg-5">
                                <form action="/checkout" method="POST">
                                    @csrf
                                    <input type="hidden" name="lent_at" value="{{ $cart->lent_at }}">
                                    <input type="hidden" name="due_at" value="{{ $cart->due_at }}">
                                    <input type="hidden" name="price" value="{{ $cart->book->price }}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="book_id" value="{{ $cart->book->id }}">
                                    @if ($cart->book->stock == 0)
                                        <button class="btn btn-sm btn-danger" disabled>Is Empty</button>
                                    @endif
                                    @if(! is_null($cart->book->deleted_at))
                                        <button class="btn btn-sm btn-danger" disabled>Is Empty</button>
                                    @else
                                        <button type="submit" class="btn btn-sm btn-primary">Checkout</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @endif
        @endauth
    </section>
@endsection
