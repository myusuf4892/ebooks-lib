@extends('admin.layouts.main')

@section('title', 'QutuBuku | Admin')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('admin.partials.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.partials.navbar')

                <!-- Begin Page Content -->
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
                        @include('admin.books.create')
                        <div class="card-header py-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-11">
                                        <h6 class="font-weight-bold text-primary mt-2">Books Table</h6>
                                    </div>
                                    <div class="col-1 justify-end">
                                        <a href="#" data-toggle="modal" data-target="#createBooks" class="btn btn-primary btn-sm">ADD</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-sm">
                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-primary text-xs text-light">
                                        <tr>
                                            <th>Isbn</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Donatur</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-xs">
                                        @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->isbn }}</td>
                                            <td>{{ $book->category->name }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>Rp. {{ number_format($book->price, 2, ',', '.') }}</td>
                                            <td>{{ $book->stock }}</td>
                                            <td>{{ $book->donatur }}</td>
                                            <td>{{ $book->created_at }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-4 col-lg-8">
                                        <span class="text-xs">showing {{ $books->firstItem() }} to {{ $books->lastItem() }} of {{ $books->total() }} results</span>
                                    </div>
                                    <div class="col-sm-8 col-lg-4">
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination pagination-sm justify-content-end">
                                              <li class="page-item @if($books->onFirstPage()) disabled @endif">
                                                <a class="page-link" href="{{ $books->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo; Prev</a>
                                              </li>
                                              <li class="page-item @if($books->onLastPage()) disabled @endif">
                                                <a class="page-link" href="{{ $books->nextPageUrl() }}">Next &raquo;</a>
                                              </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.logout')
@endsection
