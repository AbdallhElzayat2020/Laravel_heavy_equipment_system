@extends('layouts.website.app')
@section('title', __('dashboard.products'))
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
                        <span>{{ __('dashboard.products') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <section class="product spad">
        <div class="container">
            <center>
                <div class="section-title">
                    <h4>{{ __('dashboard.products') }}</h4>
                </div>
            </center>
            <div class="row g-4 property__gallery">
                @foreach ($products as $product)
                    <div class="card h-100 border-0 shadow-sm transition-all rounded-3 overflow-hidden">
                        <div class="position-relative">
                            <!-- Product Image -->
                            <div
                                class="ratio ratio-1x1 bg-light d-flex align-items-center justify-content-center position-relative card-content">
                                <img src="{{ asset('uploads/products/' . $product->images()->first()->file_name) }}"
                                    class="card-img-top object-fit-cover transition-scale" alt="{{ $product->name }}">
                                <!-- Quick View Button -->
                                <button
                                    class="btn btn-light btn-icon position-absolute translate-middle shadow-sm rounded-circle"
                                    data-bs-toggle="modal" data-bs-target="#showProductModal-{{ $product->id }}">
                                    <span class="arrow_expand"></span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Product Name -->
                            <h5 class="card-title mb-2">
                                <a href="{{ route('website.products.show', $product->id) }}"
                                    class="text-danger text-decoration-none hover-primary font-weight-bold">
                                    {{ $product->name }}
                                </a>
                            </h5>

                            <!-- Description -->
                            <p class="card-text text-muted small mb-3 text-truncate" style="max-width: 90%;">
                                {{ Str::limit($product->description, 60) }}

                            </p>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="showProductModal-{{ $product->id }}" tabindex="-1" aria-hidden="true">
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
                                    <img src="{{ asset('uploads/products/' . $product->images()->first()->file_name) }}"
                                        class="img-fluid rounded shadow" style="max-height: 75vh; object-fit: contain;"
                                        alt="{{ $product->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
