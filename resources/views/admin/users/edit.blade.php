@extends('admin.layouts.main')

@section('title', $title)

@section('content')
<div id="content">
    @include('admin.partials.navbar')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-10 col-sm-11 col-lg-11">
                            <h6 class="font-weight-bold text-primary mt-2">Edit User</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-8 justify-center">
                    <form action="/admin/users" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}"/>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}"/>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}"/>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
