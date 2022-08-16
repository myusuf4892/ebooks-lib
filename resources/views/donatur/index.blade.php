@extends('layouts.main')

@section('title', $title)

@section('content')
    <h1>Welcome {{ Auth::user()->name }}</h1>
    <a href="/">back to home</a>
@endsection
