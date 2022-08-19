<div class="container">
    <div class="row flex-row row-cols-12 gap-4 justify-content-center">
            @foreach ($books as $book)
            <div class="card mt-3 mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ url('storage/images/'.$book->image)  }}" class="img-fluid rounded-start justify-content-center">
                  </div>
                  <div class="col-md-4">
                    <div class="card-body">
                      <h5 class="card-title">{{ $book->title }}</h5>
                      <p class="card-text">{{ $book->description }}</p>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
    </div>
</div>
