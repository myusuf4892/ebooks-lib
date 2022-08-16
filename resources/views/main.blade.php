@extends('layouts.main')

@section('title', $title)

@section('content')
    @auth
        @if (Auth::user()->role->id === 1)
        <section>
            @include('partials.slider')
        </section>
        <section>
            <h1>Catalog</h1>
        </section>
        <section>
            <h1>About Us</h1>
        </section>
        @endif
        @if (Auth::user()->role->id === 2)
        <section>
            @include('partials.slider')
        </section>
        <section>
            <h1>Catalog</h1>
        </section>
        <section>
            <h1>About Us</h1>
        </section>
        @endif
        @if (Auth::user()->role->id === 3)
        <section>
            @include('partials.slider')
        </section>
        <section>
            <h1>Catalog</h1>
        </section>
        <section>
            <h1>About Us</h1>
        </section>
        @endif
    @endauth
    @guest()
    <section>
        @include('partials.slider')
    </section>
    <section>
        <h1>Catalog</h1>
    </section>
    <section>
        <h1>About Us</h1>
    </section>
    @endguest
@endsection
