@extends('donatur.layouts.main')

@section('title', $blog->brand)

@section('content')
<div id="content">
    @include('donatur.partials.navbar')
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
            @include('donatur.books.create')
            {{-- @include('admin.books.edit') --}}
            <div class="card-header py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-10 col-sm-11 col-lg-11">
                            <h6 class="font-weight-bold text-primary mt-2">Books Table</h6>
                        </div>
                        <div class="col-2 col-sm-1 col-lg-1 justify-content-end">
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
                                <th>Status</th>
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
                                <td>{{ $book->user->name }}</td>
                                <td>{{ $book->created_at }}</td>
                                <td>{{ $book->status }}</td>
                                <td>
                                    <form action="/admin/books/{{ $book->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="/admin/books/{{ $book->isbn }}/edit" class="btn btn-sm btn-warning"><ion-icon name="create-outline" class="text-bold text-center mt-1"></ion-icon></a>
                                        <button type="submit" class="btn btn-sm btn-danger d-inline-block" onclick="return confirm('Are you sure you want to delete this item')"><ion-icon name="close-circle-outline" class="text-bold text-center mt-1"></ion-icon></button>
                                    </form>
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
@endsection
