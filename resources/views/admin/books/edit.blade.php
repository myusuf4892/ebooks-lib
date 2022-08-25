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
                            <h6 class="font-weight-bold text-primary mt-2">Edit Books</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-8 justify-center">
                    <form action="/admin/books/{{ $bookDetail->id }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="isbn" value="{{ $bookDetail->isbn }}"/>
                        <div class="form-group">
                            <div class="col-2">
                                <img src="{{ asset('images/'.$bookDetail->image) }}" class="mb-3">
                            </div>
                            <label for="image">Image</label>
                            <input id="image" type="file" name="image" class="form-control-file @error('image') is-invalid @enderror"/>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" type="text" placeholder="Title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $bookDetail->title) }}" required/>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input id="author" type="text" placeholder="Author" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $bookDetail->author) }}" required/>
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="publisher">Publisher</label>
                            <input id="publisher" type="text" placeholder="Publisher" name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher', $bookDetail->publisher) }}" required/>
                            @error('publisher')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input id="description" type="hidden" name="description" value="{{ old('description', $bookDetail->description) }}"/>
                            <trix-editor input="description"></trix-editor>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" type="text" placeholder="Price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $bookDetail->price) }}" required/>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Quantity</label>
                            <input type="text" placeholder="Quantity" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $bookDetail->stock) }}" required/>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="status" value="{{ $bookDetail->status }}" required/>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="category">Categories</label>
                            </div>
                            <select name="category_id" class="custom-select" id="category">
                                <option selected class="text-lg" value="{{ old('category_id', $bookDetail->category_id) }}">{{ $bookDetail->category->name }}</option>
                                <option>Choose...</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
