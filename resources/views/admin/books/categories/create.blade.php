<div class="modal fade" id="createCategories" tabindex="-1" role="dialog" aria-labelledby="createCategories"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createCategories">Form Add Categories</h5>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="table-responsive table-sm">
                    <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                        <thead class="bg-primary text-xs text-light text-center">
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="text-xs">
                            @foreach ($categoriesItem as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td class="text-center">
                                    <form action="/admin/books/categories/{{ $category->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger d-inline-block" onclick="return confirm('Are you sure you want to delete this item')"><ion-icon name="close-circle-outline" class="text-bold text-center mt-1"></ion-icon></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6 col-lg-6">
                        <span class="text-xs">showing {{ $categoriesItem->firstItem() }} to {{ $categoriesItem->lastItem() }} of {{ $categoriesItem->total() }} results</span>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-6">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-end">
                            <li class="page-item @if($categoriesItem->onFirstPage()) disabled @endif">
                                <a class="page-link" href="{{ $categoriesItem->previousPageUrl() }}" tabindex="-1" aria-disabled="true">&laquo; Prev</a>
                            </li>
                            <li class="page-item @if($categoriesItem->onLastPage()) disabled @endif">
                                <a class="page-link" href="{{ $categoriesItem->nextPageUrl() }}">Next &raquo;</a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container">
                <form action="/admin/books/categories" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"  required/>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"  required/>
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <div class="row justify-content-end">
                        <div class="col-3 col-md-2">
                            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-3 col-md-2">
                            <button type="submit" class="btn btn-sm btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/admin/books/categories/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
