<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <h3>Catalog</h3>
      </header>

      <div class="row justify-content-end mb-3">
        <div class="col-4 col-lg-2 text-end">
            <a href="/books" class=""><ion-icon name="book-outline"></ion-icon> see all books</a>
        </div>
      </div>

      <div class="row g-5">
        @foreach ($books as $book)
        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="box">
              <div class="image-fluid mb-3"><img src="{{ asset('images/'. $book->image) }}" alt=""></div>
              <h4 class="title"><a href="/books/{{ $book->id }}">{{ $book->title }}</a></h4>
              <p class="text-center">Quantity {{ $book->stock }}</p>
              <p class="price">Rp. {{ number_format($book->price, 0, ',', '.') }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section><!-- End Services Section -->
