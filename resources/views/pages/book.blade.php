@extends('layouts.main')

@section('title', 'Book')

@section('content')
    <h1>Book</h1>
    <h4>Welcome Book</h4>
    @foreach ($books as $book)
        {{ $book->id }}
       {{ $book->bookDetail->isbn }}
       {{ $book->bookDetail->title }}
    @endforeach
@endsection
