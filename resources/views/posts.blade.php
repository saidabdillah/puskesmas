@extends('layouts.app')
@section('content')
    <main class="main">

      <!-- Featured Services Section -->
      <section id="featured-services" class="featured-services section">
        <!-- Section Title -->
        <div class="container section-title mt-5" data-aos="fade-up">
          <h2>Featured Services</h2>
          <p>
            Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
            consectetur velit
          </p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            @foreach($posts as $post)
                <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-heartbeat"></i>
                </div>
                <div class="service-image">
                  <img
                    src="{{ asset('storage/' . $post->image) }}"
                    alt="Service"
                    class="img-fluid"
                    loading="lazy"
                  />
                </div>
                <div class="service-content">
                  <h3>{{ $post->title }}</h3>
                  <p>
                    {!! Str::limit($post->body, 100) !!}
                  </p>
                  <a href="{{ route('posts.index', $post->slug) }}" class="service-link"
                    >Learn More <i class="fas fa-arrow-right"></i
                  ></a>
                </div>
              </div>
            </div>
            @endforeach
            <!-- End Service Card -->
          </div>
        </div>
        {{-- <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="700">
            <a href="specialists.html" class="view-all-link">
                Browse Complete Directory
                <i class="bi bi-chevron-right"></i>
            </a>
        </div> --}}
      </section>
      <!-- /Featured Services Section -->
    </main>

@endsection
