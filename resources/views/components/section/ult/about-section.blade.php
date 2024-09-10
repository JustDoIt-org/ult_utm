@props(['about' => ''])

<section id="about" class="about section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>{{ __('About Us') }}</h2>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">
      <div class="col-lg" data-aos="fade-up" data-aos-delay="200">
        <p>{{ $about->desc }} </p>
      </div>

    </div>

  </div>

</section>
