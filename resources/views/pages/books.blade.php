@extends('layouts.pages')

@section('title', $title)

@section('content')
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3>Catalog</h3>
        </header>

        {{ $books->links() }}

        <div class="row g-5">
            @foreach ($books as $book)
            <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
                <div class="image-fluid mb-3"><img src="{{ asset('images/'. $book->image) }}" alt=""></div>
                <h4 class="title"><a href="/books/{{ $book->id }}">{{ $book->title }}</a></h4>
                <p class="price">{{ $book->price }}</p>
            </div>
            </div>
            @endforeach
        </div>
        </div>
    </section>
@endsection
