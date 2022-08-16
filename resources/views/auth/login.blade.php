@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="container d-flex mt-5 justify-content-center ">
    <div class="row border border-2 rounded shadow">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @if (session()->has('success'))
            <div class="alert alert-success mt-2" id="success-alert" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
            @endif
            @if (session()->has('loginError'))
            <div class="alert alert-danger mt-2" id="error-alert" role="alert">
                <strong>{{ session('loginError') }}</strong>
            </div>
            @endif
            <h3 class="text-center mt-3 mb-4">{{ $title }}</h3>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="form-floating mb-4">
                        <input id="email" placeholder="email" name="email" type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email') }}" autofocus required/>
                        <label for="email">Email<span class="text-danger">*</span></label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input id="password" placeholder="password" name="password" type="password" class="form-control form-control-sm" required/>
                        <label for="password">Password<span class="text-danger">*</span></label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="d-grid gap-2 mx-auto mb-4 rounded">
                <button type="submit" class="btn btn-primary">LOGIN</button>
                <span>Not register? <a href="/register" class="text-decoration-none">Register Now!</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

