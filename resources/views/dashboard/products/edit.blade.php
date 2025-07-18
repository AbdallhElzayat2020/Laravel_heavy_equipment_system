@extends('layouts.dashboard.app')
@section('title', __('dashboard.edit_product'))

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-9 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.edit_product') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.products.index') }}">
                                        {{ __('dashboard.products') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="">
                                        {{ __('dashboard.edit_product') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-11">
                    <div class="content-body">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-colored-form-control">
                                    {{ __('dashboard.products') }}
                                </h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body">
                                    {{-- erorrs --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <a href="{{ route('dashboard.products.index') }}" class="btn btn-sm btn-primary mb-2">
                                        <i class="la la-arrow-left"></i> {{ __('dashboard.back') }}
                                    </a>

                                    <form class="form" action="{{ route('dashboard.products.update', $product->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input name="id" hidden value="{{ $product->id }}" />

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="eventRegInput1">{{ __('dashboard.name_en') }}</label>
                                                        <input type="text"
                                                            value="{{ $product->getTranslation('name', 'en') }}"
                                                            class="form-control"
                                                            placeholder="{{ __('dashboard.name_en') }}" name="name[en]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="eventRegInput1">{{ __('dashboard.name_ar') }}</label>
                                                        <input type="text"
                                                            value="{{ $product->getTranslation('name', 'ar') }}"
                                                            class="form-control"
                                                            placeholder="{{ __('dashboard.name_ar') }}" name="name[ar]">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="eventRegInput1">{{ __('dashboard.description_en') }}</label>
                                                        <textarea class="form-control" name="description[en]">{{ $product->getTranslation('description', 'en') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="eventRegInput1">{{ __('dashboard.description_ar') }}</label>
                                                        <textarea class="form-control" name="description[ar]">{{ $product->getTranslation('description', 'ar') }}</textarea>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label
                                                            for="eventRegInput1">{{ __('dashboard.select_category') }}</label>
                                                        <select class="form-control" name="category_id">
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @if ($product->category_id == $category->id) selected @endif>
                                                                    {{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="image">{{ __('dashboard.images') }}</label>
                                                        <input type="file" multiple name="images[]" class="form-control"
                                                            id="product_images" placeholder="{{ __('dashboard.image') }}">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="form-actions left">
                                            <a href="{{ url()->previous() }}" type="button" class="btn btn-warning mr-1">
                                                <i class="ft-x"></i> {{ __('dashboard.cancel') }}
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> {{ __('dashboard.save') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        var lang = "{{ app()->getLocale() }}";
        $(function() {

            $('#product_images').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 10,
                enableResumableUpload: false,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    @if ($product->images->count() > 0)
                        @foreach ($product->images as $image)
                            "{{ asset('uploads/products/'.$image->file_name) }}",
                        @endforeach
                    @endif
                ],
                initialPreviewConfig: [
                    @if ($product->images->count() > 0)
                        @foreach ($product->images as $image)
                            {
                                caption: "{{ $image->file_name }}",
                                width: '200px',
                                url: "{{ route('dashboard.products.image.delete', [$image->id, '_token' => csrf_token()]) }}",
                                key: "{{ $image->id }}",

                            },
                        @endforeach
                    @endif
                ]


            });


        });
    </script>
@endpush
