@extends('layouts.dashboard.app')
@section('title')
    {{ __('dashboard.sliders') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.sliders') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.sliders.index') }}">
                                        {{ __('dashboard.sliders') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="display: flex; justify-content: center;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="row-separator-colored-controls">{{ __('dashboard.sliders') }}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form action="{{ route('dashboard.sliders.store') }}" method="POST"
                                    enctype="multipart/form-data" class="form form-horizontal row-separator setting_form">
                                    @csrf
                                    <div class="form-body">
                                        {{-- Media --}}
                                        <h4 class="form-section"><i class="la la-envelope"></i>{{ __('dashboard.media') }}
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="image">{{ __('dashboard.images') }}</label>
                                                    <input type="file" multiple name="images[]" class="form-control"
                                                        id="product_images" placeholder="{{ __('dashboard.image') }}">
                                                </div>
                                            </div>
                                            @error('images')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        {{-- end media --}}
                                    </div>
                                    {{-- buttons --}}
                                    <div class="form-actions right">
                                        
                                        <button  id="submit_btn" type="submit" class="btn btn-primary">
                                            <i class="la la-check"></i> {{ __('dashboard.update') }}
                                        </button>

                                    </div>
                                    {{-- end button --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- File Input (Logo & Favicon) --}}
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
                    @if ($sliders->count() > 0)
                        @foreach ($sliders as $image)
                            "{{ asset('uploads/sliders/'.$image->file_name) }}",
                        @endforeach
                    @endif
                ],
                initialPreviewConfig: [
                    @if ($sliders->count() > 0)
                        @foreach ($sliders as $image)
                            {
                                caption: "{{ $image->file_name }}",
                                width: '200px',
                                url: "{{ route('dashboard.sliders.image.delete', [$image->id, '_token' => csrf_token()]) }}",
                                key: "{{ $image->id }}",

                            },
                        @endforeach
                    @endif
                ]


            });


        });
    </script>
@endpush
