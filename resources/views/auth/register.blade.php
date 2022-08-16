@extends('layouts.main')

@section('title', $title)

@section('content')
<div class="container d-flex mt-5 justify-content-center">
    <div class="row border border-2 rounded shadow">
        <div class="col-md-12 col-lg-12 px-20 py-10">
            <h3 class="text-center mt-3 mb-4">{{ $title }}</h3>
            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="form-floating mb-4">
                        <input id="name" placeholder="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus required/>
                        <label for="name">Name<span class="text-danger">*</span></label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input id="phone" placeholder="phone" type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required/>
                        <label for="phone">Phone<span class="text-danger">*</span></label>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-4">
                        <input id="email" placeholder="email" type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required/>
                        <label for="email">Email<span class="text-danger">*</span></label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input id="password" placeholder="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required/>
                        <label for="password">Password<span class="text-danger">*</span></label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" class="form-control" name="status" value="{{ $status }}" />
                    <input type="hidden" class="form-control" name="role_id" value="{{ $roleUser }}" />
                    <a href="/register/donatur" class="text-decoration-none">Register as donatur</a>
                </div>
                <div class="d-grid gap-2 mx-auto mb-4 rounded">
                <button type="submit" class="btn btn-primary">REGISTER</button>
                <span>Are you have account?  <a href="/login" class="text-decoration-none">Login here!</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
