@extends('admin.layouts.main')

@section('title', $title)

@section('content')
<div id="content">
    @include('admin.partials.navbar')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success mt-2" id="alert-pop" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="card position-relative mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                    </div>
                    <div class="container my-3">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-8 col-md-8 col-lg-6">
                                <form action="/admin/profile/{{ Auth::user()->id }}" enctype="multipart/form-data" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-6 col-lg-6 text-center mt-3">
                                            <img src="{{ asset('images/avatar/'.$user->avatar) }}" class="img-fluid" style="border-radius: 50%; height: 70%; width: 80%; padding: 0;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input id="avatar" type="file" class="form-control-file @error('avatar') is-invalid @enderror" name="avatar"/>
                                        @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" />
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}" />
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-6 col-lg-4 text-center mt-3">
                                            <button type="submit" class="btn btn-sm btn-warning rounded">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
