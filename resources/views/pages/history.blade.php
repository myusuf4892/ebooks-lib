@extends('layouts.pages')

@section('title', $title)

@section('content')
<section id="about" class="about">
    @auth()
        @if (Auth::user()->role->id == 3)
            <header class="section-header">
                <h3>History Borrow</h3>
            </header>
            <hr>
            <div class="container">
                @if (session()->has('success'))
                    <div class="alert alert-success mt-2" id="success-alert" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @foreach ($data as $item)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-sm-6 col-lg-6 text-center">
                        <h4>{{ $item->book->title }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 col-lg-4">
                        <span>Order ID</span><br>
                        <span>Lent At</span><br>
                        <span>Due At</span><br>
                        <span>Return At</span><br>
                        <span>Payment Status</span><br>
                        <span>Status Returned</span><br>
                        <span>Amount</span><br>
                        <span>Amercement</span><br>
                    </div>
                    <div class="col-7 col-lg-8">
                        <span>{{ $item->order_id }}</span><br>
                        <span>{{ $item->lent_at }}</span><br>
                        <span>{{ $item->due_at }}</span><br>
                        <span>{{ $item->return_at }}</span><br>
                        <span>{{ $item->payment_status }}</span><br>
                        <span>{{ $item->status_returned }}</span><br>
                        <span>{{ $item->price }}</span><br>
                        <span>{{ $item->amercement }}</span>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-4 col-sm-3 col-lg-2">
                        <form action="/books/return/{{ $item->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary @if(! is_null($item->return_at)) disabled @endif">Return Book</button>
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
