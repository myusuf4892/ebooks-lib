@extends('admin.layouts.auth')

@section('title', $title)

@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="/register" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="name"
                                    placeholder="Full name" value="{{ old('name') }}" autofocus required/>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control form-control-user ,@error('phone') is-invalid @enderror" id="phone"
                                    placeholder="Phone" value="{{ old('phone') }}" required/>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                                    placeholder="Email Address" value="{{ old('email') }}" required/>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                    id="exampleInputPassword" placeholder="Password" value="{{ old('password') }}" required/>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <input name="status" type="hidden" value="{{ $status }}">
                            <input name="role_id" type="hidden" value="{{ $roleUser }}">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="/register/donatur">Register as donatur</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="/login">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
