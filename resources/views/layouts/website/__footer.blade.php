<footer style="background-color:#ffe7e7" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="{{ route('website.home') }}"><img src="{{ asset($setting->site_logo) }}"
                                width="160px" alt=""></a>
                    </div>
                    <p>{{ $setting->site_address }}.</p>

                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="footer__widget">
                    <h6>{{ __('dashboard.quiqe_links') }}</h6>
                    <ul>
                        <li><a href="{{ route('website.home') }}">{{ __('dashboard.home') }}</a></li>
                        <li><a href="{{ route('website.products.index') }}">{{ __('dashboard.products') }}</a>
                        </li>
                        <li><a href="{{ route('website.contact') }}">{{ __('dashboard.contact_us') }}</a></li>
                        <li><a
                                href="{{ route('website.aftersaleservice') }}">{{ __('dashboard.after_sale_service') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="footer__widget">
                    <h6>{{ __('dashboard.corporate') }}</h6>
                    <ul>
                        <li><a href="{{ route('website.aboutus') }}">{{ __('dashboard.about_us') }}</a></li>
                        <li><a
                                href="{{ route('website.qualitypolicy') }}">{{ __('dashboard.our_quality_policy') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer__widget">
                    <h6>{{ __('dashboard.communication') }}</h6>
                    <ul>
                        <li>{{ __('dashboard.address') }}: {{ $setting->site_address }} </li>
                        <li>
                            {{ __('dashboard.phone') }} : {{ $setting->site_phone }}
                        </li>
                        <li>
                            {{ __('dashboard.email') }} : {{ $setting->site_email }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div><br>
</footer>

