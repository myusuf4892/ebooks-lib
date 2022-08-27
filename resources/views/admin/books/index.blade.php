@extends('admin.layouts.main')

@section('title', $blogs->brand)

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
            @include('admin.books.create')
            @include('admin.books.categories.create')
            <div class="card-header py-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-5 col-md-3 col-sm-8 col-lg-10">
                            <h6 class="font-weight-bold text-primary mt-2">Books Table</h6>
                        </div>
                        <div class="col-3 col-md-5 col-sm-2 col-lg-1 text-right">
                            <a href="#" data-toggle="modal" data-target="#createBooks" class="btn btn-primary btn-sm" style="font-size: 10px;"><ion-icon name="add-outline"></ion-icon>Books</a>
                        </div>
                        <div class="col-3 col-md-4 col-sm-2 col-lg-1 text-left">
                            <a href="#" data-toggle="modal" data-target="#createCategories" class="btn btn-sm btn-primary" style="font-size: 10px;"><ion-icon name="add-outline"></ion-icon>Category</a>
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
                                <td>{{ ($books->currentPage() - 1) * $books->perPage() + $loop->iteration }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->category->name }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->publisher }}</td>
                                <td>Rp. {{ number_format($book->price, 0, ',', '.') }}</td>
                                <td>{{ $book->stock }}</td>
                                <td>{{ $book->user->name }}</td>
                                <td>{{ $book->created_at }}</td>
                                <td class="text-center">
                                @if ($book->status == 'rejected')
                                    <span class="text-uppercase text-danger text-bold">{{ $book->status }}</span>
                                @endif
                                @if ($book->status == 'verified')
                                    <span class="text-uppercase text-success text-bold">{{ $book->status }}</span>
                                @else
                                <form action="/verification" method="POST" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="isbn" value="{{ $book->isbn}}">
                                    <input type="hidden" name="status" value="verified">
                                    <button type="submit" class=" btn btn-sm btn-success d-inline-block"><ion-icon name="shield-checkmark-outline"></ion-icon></button>
                                </form>
                                <form action="/verification" method="POST" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="isbn" value="{{ $book->isbn }}">
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class=" btn btn-sm btn-danger d-inline-block"><ion-icon name="shield-checkmark-outline"></ion-icon></button>
                                </form>
                                @endif
                                </td>
                                <td>
                                    <form action="/admin/books/{{ $book->id }}" method="POST" class="d-inline-block">
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
                </div>
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
@endsection
