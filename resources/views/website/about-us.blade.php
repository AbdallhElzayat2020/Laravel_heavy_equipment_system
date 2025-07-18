@extends('layouts.website.app')
@section('title',__('dashboard.about_us'))
@section('content')
      <!-- Breadcrumb Begin -->
      <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('website.home') }}"><i class="fa fa-home"></i> {{ __('dashboard.home') }}</a>
                        <span>{{ __('dashboard.about_us') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- about us -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="blog__details__content">
                        <div class="blog__details__item">
                            <img src="{{ asset($setting->about_us_image) }}" alt="{{ __('dashboard.about_us') }}" style="min-height: 55ch;max-height:55ch;min-width:70ch;max-width:70ch">

                        </div>

                        <div class="blog__details__quote">
                            <div class="icon"><i class="fa fa-quote-left"></i></div>
                            <p>{{ __('dashboard.who_are_we') }} ?</p>
                        </div>
                        <div class="blog__details__desc">
                            <p>{{ $setting->site_description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>{{ __('dashboard.links') }}</h4>
                            </div>
                            <ul>
                                <li><a href="{{ route('website.home') }}">{{ __('dashboard.home') }} <span></span></a></li>
                                <li><a href="{{ route('website.products.index') }}">{{ __('dashboard.products') }}<span>{{ $products_count }}</span></a></li>
                                <li><a href="{{ route('website.aftersaleservice') }}">{{ __('dashboard.after_sale_service') }} <span></span></a></li>
                                <li><a href="{{ route('website.contact') }}">{{ __('dashboard.contact_us') }} <span></span></a></li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection
