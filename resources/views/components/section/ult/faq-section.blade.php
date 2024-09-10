    <!-- Faq 2 Section -->
    <section id="faq-2" class="faq-2 section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('Frequently Asked Questions') }}</h2>
        <p></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="faq-container">

              @foreach ($faq as $key)
                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                  <i class="faq-icon bi bi-question-circle"></i>
                  <h3><?= $key['question'] ?></h3>
                  <div class="faq-content">
                    <p><?= $key['answer'] ?></p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
              @endforeach
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Faq 2 Section -->
