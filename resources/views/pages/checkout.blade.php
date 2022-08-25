@extends('layouts.main')

@section('title', 'Book')

@section('content')
    <section id="about" class="about">
        @auth()
            @if (Auth::user()->role->id == 3)
                <header class="section-header">
                    <h3>Checkout</h3>
                </header>
                <hr>
                <div class="container">
                    @foreach ($lents as $lent)
                    <div class="row mb-3">
                        <div class="col-4 col-sm-2 col-md-4 col-lg-3">
                            <img src="{{ asset('images/' . $lent->book->image) }}" class="img-fluid">
                        </div>
                        <div class="col-4 col-sm-6 col-md-6 col-lg-4">
                            <h4>{{ $lent->book->title }}</h4>
                            <span>Lent {{ $lent->lent_at }}</span><br>
                            <span>Due {{ $lent->due_at }}</span><br><br>
                        </div>
                        <div class="col-4 col-md-4 col-md-2 col-lg-5">
                            <a href="#" class="btn btn-sm btn-primary">PAY</a>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            @endif
        @endauth
    </section>
@endsection
