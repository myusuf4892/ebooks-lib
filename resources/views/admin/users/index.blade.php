@extends('admin.layouts.main')

@section('title', $title)

@section('content')
<div id="content">
    @include('admin.partials.navbar')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            @if (session()->has('errorBook'))
            <div class="alert alert-danger mt-2" id="error-alert" role="alert">
                <strong>{{ session('errorBook') }}</strong>
            </div>
            @endif
            @if (session()->has('success'))
            <div class="alert alert-success mt-2" id="success-alert" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
            @endif

            <div class="card-header py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-10 col-sm-11 col-lg-11">
                            <h6 class="font-weight-bold text-primary mt-2">Users Table</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-sm">
                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-xs text-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs">
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td class="text-center text-uppercase text-bold text-success">{{ $user->status }}</td>
                                <td class="text-center">
                                    <form action="/admin/users/verification" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="hidden" name="status" value="active">
                                    <button type="submit" class="btn btn-sm btn-success" @if($user->status == 'active') disabled @endif>
                                        <ion-icon name="shield-checkmark-outline"></ion-icon>
                                    </button>
                                    <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-sm btn-warning"><ion-icon name="create-outline" class="text-bold text-center mt-1"></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-lg-8">
                        <span class="text-xs">showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-end">
                            <li class="page-item @if($users->onFirstPage()) disabled @endif">
                                <a class="page-link" href="{{ $users->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo; Prev</a>
                            </li>
                            <li class="page-item @if($users->onLastPage()) disabled @endif">
                                <a class="page-link" href="{{ $users->nextPageUrl() }}">Next &raquo;</a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
