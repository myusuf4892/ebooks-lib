@extends('layouts.pages')

@section('title', $title)

@section('content')
<section id="about" class="about">
    <header class="section-header">
        <h3>History Borrow</h3>
    </header>
    <hr>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success mt-2" id="alert-pop" role="alert">
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
                @if ($item->return_at == null)
                <span class="text-uppercase text-warning">
                  not yet
                </span><br>
                @else
                <span>
                  {{ $item->return_at }}
                </span><br>
                @endif
                <span>{{ $item->payment_status }}</span><br>
                @if ($item->status_returned == 'still borrowed')
                <span class="text-uppercase text-danger">
                  borrowed
                </span><br>
                @else
                <span class="text-uppercase text-success">
                  returned
                </span><br>
                @endif
                <span>{{ $item->price }}</span><br>
                <span>{{ $item->amercement }}</span>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
</section>
@endsection
