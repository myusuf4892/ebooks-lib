@extends('layouts.main')

@section('title', $title)

@section('content')
<main id="main">

    @include('partials.hero')

    @include('partials.about')

    @include('partials.catalog')

    @include('partials.testimonial')

</main><!-- End #main -->
@endsection
