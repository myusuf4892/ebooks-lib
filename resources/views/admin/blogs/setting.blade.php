<div class="modal fade" id="updateSettings" tabindex="-1" role="dialog" aria-labelledby="createbooks"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createbooks">Form Add Books</h5>
        </div>
        <div class="modal-body">
            <form action="/admin/settings/{{ $blog->id }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand', $blog->brand) }}"  required/>
                    @error('brand')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="linkedIn" class="form-label">LinkedIn</label>
                    <input type="text" name="linkedIn" class="form-control @error('linkedIn') is-invalid @enderror" value="{{ old('linkedIn', $blog->linkedIn) }}" required/>
                    @error('linkedIn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="contact" class="form-label">No Handphone</label>
                    <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact', $blog->contact) }}" required/>
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="created_by" class="form-label">Created By</label>
                    <input type="text" name="created_by" class="form-control @error('created_by') is-invalid @enderror" value="{{ old('created_by', $blog->created_by) }}" required/>
                    @error('created_by')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
