@extends('layouts.pages')

@section('title', $title)

@section('content')
    <section id="about" class="about">
        @auth()
            @if (Auth::user()->role->id == 3)
                <header class="section-header">
                    <h3>Cart</h3>
                    <hr>
                </header>
                <div class="container">
                    @if (session()->has('error'))
                    <div class="alert alert-danger mt-2" id="error-alert" role="alert">
                        <strong>{{ session('error') }}</strong>
                    </div>
                    @endif
                    @foreach ($carts as $cart)
                        <div class="row">
                            <div class="col-4 col-sm-2 col-md-4 col-lg-3">
                                <img src="{{ asset('images/' . $cart->book->image) }}" class="img-fluid">
                            </div>
                            <div class="col-8 col-sm-10 col-md-8 col-lg-9">
                                <h4>{{ $cart->book->title }}</h4>
                                <div class="row">
                                    <div class="col-3 col-md-2 col-lg-2">
                                        <span>Lent_at</span><br>
                                        <span>Due_at</span><br>
                                    </div>
                                    <div class="col-9 col-md-10 col-lg-10">
                                        <span>{{ $cart->lent_at }}</span><br>
                                        <span>{{ $cart->due_at }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-4 col-md-2 col-sm-3 col-lg-2">
                                <a href="/checkout/{{ $cart->id }}/confirm" class="btn btn-sm btn-primary">Checkout</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            @endif
        @endauth
    </section>
@endsection
