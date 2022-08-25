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
                                <th>Isbn</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Lent at</th>
                                <th>Due at</th>
                                <th>Return at</th>
                                <th>Borrower</th>
                                <th>Price</th>
                                <th>Amercement</th>
                            </tr>
                        </thead>
                        <tbody class="text-xs">
                            @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->isbn }}</td>
                                <td>{{ $report->category->name }}</td>
                                <td>{{ $report->title }}</td>
                                <td>{{ $report->author }}</td>
                                @foreach ($report->lents as $lent )
                                <td>{{ $lent->lent_at }}</td>
                                <td>{{ $lent->due_at }}</td>
                                <td>{{ $lent->return_at }}</td>
                                @endforeach
                                <td>{{ $report->user->name }}</td>
                                <td>Rp. {{ number_format($report->price, 0, ',', '.') }}</td>
                                <td>Rp. </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="8" class="text-center text-bold text-light bg-primary">Total</td>
                                <td class="text-bold text-light bg-primary">Rp. {{ number_format($booksAmount->sum('price'), 0, ',', '.') }}</td>
                                <td class="text-center text-bold text-light bg-primary"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
@endsection
