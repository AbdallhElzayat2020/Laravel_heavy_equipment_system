<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                        href="javascript:void(0)"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="javascript:void(0)">
                        <img style="min-height: 40px; max-height:40px;min-width:80px;max-width:80px" class="brand-logo" alt="{{ $setting->site_name }}" src="{{ asset($setting->site_logo) }}">
                        <h3 class="brand-text">{{ auth()->user()->name }}</h3>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0"
                        data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white"
                            data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>

                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="javacript:void(0)" data-toggle="dropdown">
                            <span class="mr-1">{{ __('dashboard.hello') }},
                                <span class="user-name text-bold-700">{{ auth()->user()->name }}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="{{ asset('assets/dashboard') }}/images/portrait/small/avatar-s-19.png"
                                    alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ route('dashboard.profile.index') }}"><i
                                    class="ft-user"></i> {{ __('dashboard.edit_profile') }} </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('dashboard.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item" href="#"><i
                                        class="ft-power"></i>{{ __('auth.logout') }}</button>
                            </form>
                        </div>
                    </li>

                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="javascript:void(0)" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-gb"></i><span
                                class="selected-language"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <i
                                        class="flag-icon @if ($localeCode == 'en') flag-icon-gb @else flag-icon-eg @endif"></i>
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </li>

                    {{-- notifications --}}
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="{{ route('dashboard.contacts.index') }}" data-toggle="dropdown"><i
                                class="ficon ft-bell"></i>
                            <span
                                class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">{{ $unread_contacts->count() }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">{{ __('dashboard.notifications') }}</span>
                                </h6>
                                <span class="notification-tag badge badge-default badge-danger float-right m-0">{{ $unread_contacts->count() }}
                                    {{ __('dashboard.new') }}</span>
                            </li>
                            <li class="scrollable-container media-list w-100">
                                @foreach ($unread_contacts as $item)
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">{{ $item->name }}</h6>
                                            <p class="notification-text font-small-3 text-muted">{{ $item->subject }}</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                    datetime="2015-06-11T18:29:20+08:00">{{ $item->created_at->diffForHumans() }}</time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                    href="{{ route('dashboard.contacts.index') }}">{{ __('dashboard.show_all') }}</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
