@extends('admin.layouts.main')

@section('title', $blogs->brand)

@section('content')
<div id="content">
    @include('admin.partials.navbar')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($total, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Books Amount</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($booksAmount, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Amercement</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($amercement, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="col-10 col-sm-11 col-lg-11">
                            <h6 class="font-weight-bold text-primary mt-2">Reports Table</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-sm">
                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-primary text-xs text-light">
                            <tr>
                                <th>No</th>
                                <th>Isbn</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Lent at</th>
                                <th>Due at</th>
                                <th>Return at</th>
                                <th>Borrower</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Amercement</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs">
                            @foreach ($reports as $index => $report)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>{{ $report->book->isbn }}</td>
                                <td>{{ $report->book->category->name }}</td>
                                <td>{{ $report->book->title }}</td>
                                <td>{{ $report->book->author }}</td>
                                <td>{{ $report->lent_at }}</td>
                                <td>{{ $report->due_at }}</td>
                                <td>{{ $report->return_at }}</td>
                                <td>{{ $report->user->name }}</td>
                                <td>{{ $report->status }}</td>
                                <td>Rp. {{ number_format($report->price, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($report->amercement, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-lg-8">
                        <span class="text-xs">showing {{ $reports->firstItem() }} to {{ $reports->lastItem() }} of {{ $reports->total() }} results</span>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-end">
                            <li class="page-item @if($reports->onFirstPage()) disabled @endif">
                                <a class="page-link" href="{{ $reports->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo; Prev</a>
                            </li>
                            <li class="page-item @if($reports->onLastPage()) disabled @endif">
                                <a class="page-link" href="{{ $reports->nextPageUrl() }}">Next &raquo;</a>
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
