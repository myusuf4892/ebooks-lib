@extends('layouts.pages')

@section('title', $title)

@section('content')
    <section id="hero" class="clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3 col-sm-5 col-md-6">
                    <img src="{{ asset('images/'. $book->image ) }}">
                </div>
                <div class="col-12 col-lg-9 col-sm-7 col-md-6">
                    <h4>{{ $book->title }}</h4>
                </div>
            </div>
            @auth()
                @if (Auth::user()->role->id == 3)
                <div class="row justify-content-end">
                    <div class="col-6 col-lg-2 col-md-4 text-end">Lent duration</div>
                    <div class="col-6 col-lg-3 col-sm-4 col-md-4">
                        <form action="/carts" method="POST">
                            @csrf
                            <select name="duration" id="duration">
                                <option value="3">3 days</option>
                                <option value="7">7 days</option>
                            </select>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="btn btn-sm btn-primary">Add Cart</button>
                        </form>
                    </div>
                </div>
                @endif
            @endauth
        </div>
    </section>
@endsection
