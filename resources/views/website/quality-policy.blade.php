@extends('layouts.website.app')
@section('title',__('dashboard.quality_policy'))
@section('content')
      <!-- Breadcrumb Begin -->
      <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('website.home') }}"><i class="fa fa-home"></i> {{ __('dashboard.home') }}</a>
                        <span>{{ __('dashboard.quality_policy') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-8">
                    <div class="blog__details__item">
                        <img src="{{ asset('assets/images/_about-us.jpg') }}" alt="{{ __('dashboard.quality_policy') }}" style="min-height: 500px;max-height:500px">

                    </div>
                </div>
                <div class="col-lg-5 col-md-4">
                    <div class="blog__details__content">
                        <div class="blog__details__quote">
                            <div class="icon"><i class="fa fa-quote-left"></i></div>
                            <p>{{ __('dashboard.quality_policy') }} ?</p>
                        </div>
                        <div class="blog__details__desc">
                            <p>{{ $setting->quality_policy }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection
