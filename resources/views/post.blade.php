@extends('layouts.app')

@section('content')
<main class="main">

    <section id="featured-services" class="featured-services section mt-5">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col">
                        <div class="service-card">
                            <div class="service-content">
                                <div class="text-center mb-4">
                                    <img
                                        src="{{ asset('storage/' . $post->image) }}"
                                        alt="{{ $post->title }}"
                                        class="img-fluid"
                                    >
                                </div>

                                <h5 class="card-title">{{ $post->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->created_at->diffForHumans() }}</h6>


                                <div class="post-body">
                                    {!! $post->body !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('home') }}" class="btn btn-danger mt-3">Kembali</a>


        </div>
    </section>

</main>
@endsection
