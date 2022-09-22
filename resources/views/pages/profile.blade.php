@extends('layouts.pages')

@section('title', $title)

@section('content')
<section id="about" class="about">
    {{-- <header class="section-header">
        <h3>Profile</h3>
    </header>
    <hr> --}}

    @if (session()->has('success'))
        <div class="alert alert-success mt-2" id="alert-pop" role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    <div class="row justify-content-center mt-3">
        <div class="col-4 text-center">
            <div class="container">
                <img src="https://ucarecdn.com/2929105b-a009-4c9d-855f-48f16499341e/user.png" class="img-fluid">
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-8 col-md-4 text-center">
            <div class="container">
                <form action="/users/{{ $user->id }}/upgrade" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="{{ $donatur }}" name="role_id">
                    @if(Auth::user()->role->id == 3)
                        <button class="btn btn-sm btn-warning mt-4" type="submit">Upgrade as donatur</button>
                    @else
                        <button class="btn btn-sm btn-success mt-4" disabled>Donatur</button>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-8 col-md-8 col-lg-4">
            <div class="container">
                <form action="/users/{{ $user->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label for="name">Name</label>
                    <input class="form-control mb-3" id="name" name="name" type="text" value="{{ $user->name }}">
                    <label for="email">Email</label>
                    <input class="form-control mb-3" id="email" name="email" type="text" value="{{ $user->email }}">
                    <label for="phone">Phone</label>
                    <input class="form-control" id="phone" name="phone" type="text" value="{{ $user->phone }}">
                    <hr>
                    <div class="container mt-2">
                        <div class="row justify-content-end">
                            <div class="col-4 col-md-3 col-sm-3">
                                <button type="submit" class="btn btn-sm btn-outline-info">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection
