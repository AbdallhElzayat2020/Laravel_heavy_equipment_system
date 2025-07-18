<header class="header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('website.home') }}">
                        <img src="{{ asset($setting->site_logo) }}" style="min-height: 50px;max-height:53px" width="120px" alt="">
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('website.home') }}">{{ __('dashboard.home') }}</a></li>
                        <li>
                            <a href="{{ route('website.products.index') }}">{{ __('dashboard.products') }}</a>
                            <ul class="product-dropdown dropdown" style="min-width: 500px">
                                @forelse ($categories as $category)
                                <li>
                                    <a href="{{ route('website.category.products', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @empty
                                <li><a href="#">{{ __('dashboard.no_categories') }}</a></li>
                                @endforelse
                            </ul>
                        </li>
                        <li>
                            <a
                                href="{{ route('website.aftersaleservice') }}">{{ __('dashboard.after_sale_service') }}</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">{{ __('dashboard.corporate') }}</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('website.aboutus') }}">{{ __('dashboard.about_us') }}</a></li>
                                <li><a href="{{ route('website.qualitypolicy') }}">{{ __('dashboard.quality_policy') }}</a>
                        </li>
                    </ul>
                    </li>
                    <li><a href="{{ route('website.contact') }}">{{ __('dashboard.contact') }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right d-flex align-items-center justify-content-end">
                    <!-- Language Switcher -->
                    <div class="dropdown me-3">
                        <button class="btn btn-light dropdown-toggle" type="button" id="languageDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-globe"></i>
                            {{ LaravelLocalization::getSupportedLocales()[App::getLocale()]['native'] }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <i
                                        class="flag-icon @if ($localeCode == 'en') flag-icon-gb @else flag-icon-eg @endif"></i>
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- User Authentication (If Needed) -->
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
    <style>
    .product-dropdown {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        padding: 1rem 0 !important;
    }
    </style>
</header>

<!-- Include Bootstrap JS (if not already included in your layout) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
