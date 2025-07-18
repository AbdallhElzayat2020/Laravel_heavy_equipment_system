@extends('layouts.website.app')
@section('title', __('dashboard.show_product'))
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/website/css/custom.css') }}">
@endpush
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('website.home') }}"><i class="fa fa-home"></i> {{ __('dashboard.home') }}</a>
                        <a href="{{ route('website.products.index') }}"><i class="fa fa-product"></i>
                            {{ __('dashboard.products') }}</a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row g-4 property__gallery">
                        @foreach ($product->images as $image)
                            <div class="">
                                <div class="card h-100 border-0 shadow-sm transition-all rounded-3 overflow-hidden">
                                    <div class="position-relative">
                                        <!-- Product Image -->
                                        <div
                                            class="ratio ratio-1x1 bg-light d-flex align-items-center justify-content-center position-relative card-content">
                                            <img style="min-height: 350px"
                                                src="{{ asset('uploads/products/' . $image->file_name) }}"
                                                class="card-img-top object-fit-cover transition-scale"
                                                alt="{{ $product->name }}">
                                            <!-- Quick View Button -->
                                            <button
                                                class="btn btn-light btn-icon position-absolute translate-middle shadow-sm rounded-circle"
                                                data-bs-toggle="modal"
                                                data-bs-target="#showProductModal-{{ $image->id }}">
                                                <span class="arrow_expand"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="showProductModal-{{ $image->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-0 rounded-3">
                                        <div class="modal-header border-0">
                                            <button type="button"
                                                class="btn btn-danger btn-icon position-absolute translate-middle shadow-sm rounded-circle btn-close"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                ×
                                            </button>
                                        </div>
                                        <div class="modal-body text-center p-4">
                                            <img src="{{ asset('uploads/products/' . $image->file_name) }}"
                                                class="img-fluid rounded shadow"
                                                style="max-height: 75vh; object-fit: contain;" alt="{{ $product->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}<span>{{ __('dashboard.category') }}:
                                {{ $product->category->name }}</span></h3>
                        <p class="card-text ">
                            {{ $product->description }}
                        </p>
                        <div class="product__details__button">
                            <a href="{{ route('website.contact') }}" class="cart-btn"><span
                                    class="icon_bag_alt"></span>{{ __('dashboard.contact') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </section>
    <!-- Product Details Section End -->
@endsection
