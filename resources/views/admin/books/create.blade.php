<div class="modal fade" id="createBooks" tabindex="-1" role="dialog" aria-labelledby="createbooks"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createbooks">Form Add Books</h5>
        </div>
        <div class="modal-body">
            <div class="container">
                <form action="/admin/books" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="Isbn 2022080001" name="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn') }}"  required/>
                        @error('isbn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror" required/>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required/>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Author" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required/>
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Publisher" name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher') }}" required/>
                        @error('publisher')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="description" type="hidden" name="description">
                        <trix-editor input="description"></trix-editor>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Price" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required/>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Quantity" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" required/>
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <input type="hidden" name="donatur" class="form-control" value="{{ Auth::user()->name }}" required/>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="category">Categories</label>
                        </div>
                        <select name="category_id" class="custom-select" id="category">
                            <option selected>Choose...</option>
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
</div>
