@extends('layouts.website.app')
@section('title', __('dashboard.contact'))
@section('content')
       <!-- Breadcrumb Begin -->
       <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('website.home') }}"><i class="fa fa-home"></i> {{ __('dashboard.home') }}</a>
                        <span>{{ __('dashboard.contact') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>{{ __('dashboard.contact_info') }}</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> {{ __('dashboard.address') }}</h6>
                                    <p>{{ $setting->site_address }}</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> {{ __('dashboard.phone') }}</h6>
                                    <p><span>{{ $setting->site_phone }}</span><span>{{ $setting->site_fax }}</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> {{ __('dashboard.support') }}</h6>
                                    <p>{{ $setting->site_email }}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>{{ __('dashboard.send_contact') }}</h5>
                            <form action="{{ route('website.contact.store') }}" method="post">
                                @csrf
                                <input name="name" type="text" placeholder="{{ __('dashboard.name') }}">
                                <input name="email" type="text" placeholder="{{ __('dashboard.email') }}">
                                <input name="subject" type="text" placeholder="{{ __('dashboard.subject') }}" >
                                <textarea name="message" placeholder="{{ __('dashboard.message') }}"></textarea>
                                <button type="submit" class="site-btn">{{ __('dashboard.send') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
                            src="https://www.google.com/maps?q={{ $setting->latitude }},{{ $setting->longitude }}&hl=es;z=14&output=embed"
                            height="780" style="border:0" allowfullscreen="">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
