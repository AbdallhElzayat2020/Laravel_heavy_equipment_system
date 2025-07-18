@extends('layouts.website.app')
@section('title', __('dashboard.home'))
@push('css')
   <link rel="stylesheet" href="{{ asset('assets/website/css/custom.css') }}">
@endpush
@section('content')
    <!-- Sliders Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="slider-container">
                        <div class="slider">
                            @if ($sliders->count() > 0)
                                @foreach ($sliders as $slider)
                                    <div class="slide"><img style="min-width: 1600px" height="564px"
                                            src="{{ asset('uploads/sliders/' . $slider->file_name) }}" alt="Slide 3"></div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    <br><br><br>
    <!-- Pormotion  film -->
    <center>
        <div class="section-title">
            <h4>{{ __('dashboard.promotion_film') }}</h4>
        </div>
    </center>
    {{-- vedio --}}
    <section  class="product spad" style="display: flex; justify-content: center;">
        <div class="row property__gallery">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <iframe width="100%" height="564px" style="min-width: 1300px" src="{{ trim($setting->site_vedio) }}"
                    allow="autoplay; fullscreen" allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <!-- about us -->
     <section class="blog-details spad">
        <div class="container">
            <center>
                <div class="section-title">
                    <h4>{{ __('dashboard.about_us') }}</h4>
                </div>
            </center>
            <div class="row">
                <div class="col-lg-7 col-md-8">
                    <div class="blog__details__item">
                        <img src="{{ asset($setting->about_us_image) }}" alt="{{ __('dashboard.about_us') }}"
                        style="height:45ch;width:65ch;">
                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <div class="blog__details__content">
                        <div class="blog__details__quote">
                            <div class="icon"><i class="fa fa-quote-left"></i></div>
                            <p>{{ __('dashboard.about_us') }} ?</p>
                        </div>
                        <div class="blog__details__desc">
                            <p>{{Str::limit( $setting->site_description,500) }}</p>
                        </div><br>
                        <a href="{{ route('website.aboutus') }}" class="btn btn-info">{{ __('dashboard.more') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- quality policy -->
     <section class="blog-details spad">
        <div class="container">
            <center>
                <div class="section-title">
                    <h4>{{ __('dashboard.our_quality_policy') }}</h4>
                </div>
            </center>
            <div class="row">
                <div class="col-lg-7 col-md-8">
                    <div class="blog__details__item">
                        <img src="{{ asset('assets/images/_about-us.jpg') }}"
                            alt="{{ __('dashboard.our_quality_policy') }}"  style="height:45ch;width:65ch;">
                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <div class="blog__details__content">
                        <div class="blog__details__quote">
                            <div class="icon"><i class="fa fa-quote-left"></i></div>
                            <p>{{ __('dashboard.our_quality_policy') }} ?</p>
                        </div>
                        <div class="blog__details__desc">
                            <p>{{Str::limit( $setting->quality_policy,500) }}</p>
                        </div>
                        <br>
                        <a href="{{ route('website.qualitypolicy') }}" class="btn btn-info">{{ __('dashboard.more') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <center>
        <div class="section-title">
            <h4>{{ __('dashboard.products') }}</h4>
        </div>
    </center>
    <!-- Products Depend on category -->
    <section class="product spad">
        @livewire('product-category-dependent', ['categories' => $categories])
    </section>
    <!-- Product Section End -->




@endsection
