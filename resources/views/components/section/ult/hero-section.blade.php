@props(['list_layanan' => ''])

<section id="hero" class="pricing section mt-16">
  <div class="container">`
    <div class="row hero-card-container">
      @foreach ($list_layanan as $item)
        <div class="col-lg-4 mt-16" data-aos="zoom-in" data-aos-delay="100">
          <div class="pricing-item">

            <h1 class="text-center">{{ $item['title'] }}</h1>
            {{-- <div class="icon text-center"><i class="bi bi-activity icon"></i></div> --}}
            <ul>
              {{-- @foreach ($list_layanan->list as $item) --}}
              <li> <span>{{ $item['desc'] }}</span></li>
              {{-- @endforeach --}}
            </ul>
            <a href="{{ route($item['link']) }}" class="buy-btn">{{ __('Go') }}</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
