<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="nav.category.ui">{{ __('dashboard.sections') }}</span><i class="la la-ellipsis-h ft-minus"
                    data-toggle="tooltip" data-placement="right" data-original-title="User Interface"></i>
            </li>
            {{-- categories --}}
            <li class="nav-item"><a href="#categoriesmenu"><i class="la la-folder"></i><span class="menu-title font-weight-bold"
                        data-i18n="nav.dash.main">{{ __('dashboard.categories') }}</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ $categories_count }}</span></a>
                <ul class="menu-content" id="categoriesmenu">
                    <li><a class="menu-item" href="{{ route('dashboard.categories.index') }}"
                            data-i18n="nav.dash.ecommerce">{{ __('dashboard.categories') }}</a>
                    </li>
                </ul>
            </li>

            {{-- products --}}
            <li class=" nav-item"><a href="#products"><i class="fa fa-box"></i><span class="menu-title font-weight-bold"
                        data-i18n="nav.dash.main">{{ __('dashboard.products') }}</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ $products_count }}</span></a>
                <ul class="menu-content" id="products">
                    <li><a class="menu-item" href="{{ route('dashboard.products.index') }}"
                            data-i18n="nav.dash.ecommerce">{{ __('dashboard.products') }}</a>
                    </li>

                </ul>
            </li>

            {{-- contacts --}}
            <li class=" nav-item"><a href="#contacts"><i class="la la-phone"></i><span class="menu-title font-weight-bold"
                        data-i18n="nav.dash.main">{{ __('dashboard.contacts') }}</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ $contacts_count }}</span></a>
                <ul class="menu-content" id="contacts">
                    <li><a class="menu-item" href="{{ route('dashboard.contacts.index') }}"
                            data-i18n="nav.dash.ecommerce">{{ __('dashboard.contacts') }}</a>
                    </li>

                </ul>
            </li>


            <li class=" navigation-header">
                <span data-i18n="nav.category.ui">{{ __('system') }}</span><i class="la la-ellipsis-h ft-minus"
                    data-toggle="tooltip" data-placement="right" data-original-title="User Interface"></i>
            </li>
            {{-- settings --}}
            <li class=" nav-item"><a href="#settings"><i class="la la-cogs"></i><span class="menu-title font-weight-bold"
                        data-i18n="nav.dash.main">{{ __('dashboard.settings') }}</span></a>
                <ul class="menu-content">
                    <li id="settings">
                        <a class="menu-item" href="{{ route('dashboard.settings.index') }}"
                            data-i18n="nav.dash.ecommerce">{{ __('dashboard.settings') }}</a>
                    </li>
                </ul>
            </li>
            {{-- Catalog --}}
            <li class=" nav-item"><a href="#catalog"><i class="la la-list"></i><span class="menu-title font-weight-bold"
                        data-i18n="nav.dash.main">{{ __('dashboard.catalog') }}</span></a>
                <ul class="menu-content" id="catalog">
                    <li>
                        <a class="menu-item" href="{{ route('dashboard.catalog.index') }}"
                            data-i18n="nav.dash.ecommerce">{{ __('dashboard.catalog') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#sliders"><i class="fa fa-images"></i><span class="menu-title font-weight-bold"
                        data-i18n="nav.dash.main">{{ __('dashboard.sliders') }}</span></a>
                <ul class="menu-content">
                    <li id="sliders">
                        <a class="menu-item" href="{{ route('dashboard.sliders.index') }}"
                            data-i18n="nav.dash.ecommerce">{{ __('dashboard.sliders') }}</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#profile"><i class="la la-user"></i><span class="menu-title font-weight-bold"
                        data-i18n="nav.dash.main">{{ __('dashboard.profile') }}</span></a>
                <ul class="menu-content" id="profile">
                    <li>
                        <a class="menu-item" href="{{ route('dashboard.profile.index') }}"
                            data-i18n="nav.dash.ecommerce">{{ __('dashboard.profile') }}</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
