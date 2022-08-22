<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h3>Catalog</h3>
        <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus.</p>
      </header>

      <div class="row g-5">
        @foreach ($books as $book)
        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="box">
            <div class="image-fluid mb-3"><img src="{{ asset('storage/images/'. $book->image) }}" alt=""></div>
            <h4 class="title"><a href="">{{ $book->title }}</a></h4>
            <p class="description">{{ $book->description }}</p>
          </div>
        </div>
        @endforeach

    </div>

    </div>
</section><!-- End Services Section -->
