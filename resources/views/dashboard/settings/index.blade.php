@extends('layouts.dashboard.app')
@section('title')
    {{ __('dashboard.settings') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.settings') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.settings.index') }}">
                                        {{ __('dashboard.settings') }}</a>
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
                            <h4 class="card-title" id="row-separator-colored-controls">{{ __('dashboard.settings') }}</h4>
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
                                <form action="{{ route('dashboard.settings.update', $setting->id) }}" method="POST"
                                    enctype="multipart/form-data" class="form form-horizontal row-separator setting_form">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-body">
                                        {{-- information --}}
                                        <h4 class="form-section"><i
                                                class="la la-eye"></i>{{ __('dashboard.basic_settings') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput1">{{ __('dashboard.site_name_ar') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly type="text" id="userinput1"
                                                            class="form-control border-primary "
                                                            placeholder="{{ __('dashboard.site_name_ar') }}"
                                                            name="site_name[ar]"
                                                            value="{{ $setting->getTranslation('site_name', 'ar') }}">

                                                        @error('site_name.ar')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput1">{{ __('dashboard.site_name_en') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly type="text" id="userinput1"
                                                            class="form-control border-primary "
                                                            placeholder="{{ __('dashboard.site_name_en') }}"
                                                            name="site_name[en]"
                                                            value="{{ $setting->getTranslation('site_name', 'en') }}">
                                                        @error('site_name.en')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput1">{{ __('dashboard.site_description_ar') }}</label>
                                                    <div class="col-md-9">
                                                        <textarea rows="10"readonly name="site_description[ar]" class="form-control">{{ $setting->getTranslation('site_description', 'ar') }}</textarea>
                                                        @error('site_description.ar')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput1">{{ __('dashboard.site_description_en') }}</label>
                                                    <div class="col-md-9">
                                                        <textarea rows="10" readonly name="site_description[en]" class="form-control">{{ $setting->getTranslation('site_description', 'en') }}</textarea>
                                                        @error('site_description.en')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput3">{{ __('dashboard.site_address_ar') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly type="text" id="userinput3"
                                                            class="form-control border-primary "
                                                            placeholder="{{ __('dashboard.site_address_ar') }}"
                                                            name="site_address[ar]"
                                                            value="{{ $setting->getTranslation('site_address', 'ar') }}">
                                                        @error('site_address.ar')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput3">{{ __('dashboard.site_address_en') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly type="text" id="userinput3"
                                                            class="form-control border-primary "
                                                            placeholder="{{ __('dashboard.site_address_en') }}"
                                                            name="site_address[en]"
                                                            value="{{ $setting->getTranslation('site_address', 'en') }}">
                                                        @error('site_address.en')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput3">{{ __('dashboard.after_sale_content_ar') }}</label>
                                                    <div class="col-md-9">
                                                        <textarea rows="10"readonly name="after_sale_content[ar]" class="form-control">{{ $setting->getTranslation('after_sale_content', 'ar') }}
                                                        </textarea>
                                                        @error('after_sale_content.ar')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row last">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput3">{{ __('dashboard.after_sale_content_en') }}</label>
                                                    <div class="col-md-9">
                                                        <textarea rows="10"readonly name="after_sale_content[en]" class="form-control">{{ $setting->getTranslation('after_sale_content', 'en') }}
                                                        </textarea>
                                                        @error('after_sale_content.en')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput1">{{ __('dashboard.quality_policy_ar') }}</label>
                                                    <div class="col-md-9">
                                                        <textarea rows="10"readonly name="quality_policy[ar]" class="form-control">{{ $setting->getTranslation('quality_policy', 'ar') }}</textarea>
                                                        @error('quality_policy.ar')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput1">{{ __('dashboard.quality_policy_en') }}</label>
                                                    <div class="col-md-9">
                                                        <textarea rows="10"readonly name="quality_policy[en]" class="form-control">{{ $setting->getTranslation('quality_policy', 'en') }}</textarea>
                                                        @error('quality_policy.en')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        {{-- end basic info --}}

                                        {{-- contact info --}}
                                        <h4 class="form-section"><i
                                                class="la la-envelope"></i>{{ __('dashboard.contact_info') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.email') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly name="site_email"
                                                            class="form-control border-primary " type="email"
                                                            placeholder="{{ __('dashboard.email') }}" id="userinput5"
                                                            value="{{ $setting->site_email }}">
                                                        @error('site_email')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.site_phone') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly name="site_phone"
                                                            class="form-control border-primary " type="text"
                                                            placeholder="{{ __('dashboard.site_phone') }}"
                                                            id="userinput5" value="{{ $setting->site_phone }}">
                                                        @error('site_phone')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.whatsapp') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly name="site_whatsapp"
                                                            class="form-control border-primary " type="number"
                                                            placeholder="{{ __('dashboard.whatsapp') }}" id="userinput5"
                                                            value="{{ $setting->site_whatsapp }}">
                                                        @error('site_whatsapp')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.fax') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly name="site_fax"
                                                            class="form-control border-primary " type="number"
                                                            placeholder="{{ __('dashboard.fax') }}" id="userinput5"
                                                            value="{{ $setting->site_fax }}">
                                                        @error('site_fax')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end contact info --}}

                                        {{-- location --}}
                                        <h4 class="form-section"><i
                                            class="la la-map"></i>{{ __('dashboard.location') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.latitude') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly name="latitude"
                                                            class="form-control border-primary " type="text"
                                                            placeholder="{{ __('dashboard.latitude') }}" id="userinput5"
                                                            value="{{ $setting->latitude }}">
                                                        @error('latitude')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div v>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.longitude') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly name="longitude"
                                                            class="form-control border-primary " type="text"
                                                            placeholder="{{ __('dashboard.longitude') }}" id="userinput5"
                                                            value="{{ $setting->longitude }}">
                                                        @error('longitude')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Media --}}
                                        <h4 class="form-section"><i
                                                class="la la-envelope"></i>{{ __('dashboard.media') }}</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.logo') }}</label>
                                                    <div class="col-md-9">
                                                        <input name="site_logo" id="logo-image"
                                                            class="form-control border-primary " type="file"
                                                            placeholder="{{ __('dashboard.site_logo') }}">
                                                        @error('site_logo')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.site_favicon') }}</label>
                                                    <div class="col-md-9">
                                                        <input name="site_favicon" id="favicon-image"
                                                            class="form-control border-primary " type="file"
                                                            placeholder="{{ __('dashboard.site_favicon') }}">
                                                        @error('site_favicon')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.about_us_image') }}</label>
                                                    <div class="col-md-9">
                                                        <input name="about_us_image" id="about_us_image"
                                                            class="form-control border-primary " type="file"
                                                            placeholder="{{ __('dashboard.about_us_image') }}">
                                                        @error('about_us_image')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                        for="userinput5">{{ __('dashboard.site_vedio') }}</label>
                                                    <div class="col-md-9">
                                                        <input readonly name="site_vedio"
                                                            class="form-control border-primary " type="text"
                                                            placeholder="{{ __('dashboard.site_vedio') }}"
                                                            id="userinput5" value="{{ $setting->site_vedio }}">
                                                        @error('site_vedio')
                                                            <strong class="text-danger"> {{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end media --}}
                                    </div>

                                    {{-- buttons --}}
                                    <div class="form-actions right">
                                        <button hidden id="cancel_btn" type="button" class="btn btn-warning mr-1">
                                            <i class="la la-remove"></i> {{ __('dashboard.cancel') }}
                                        </button>
                                        <button hidden id="submit_btn" type="submit" class="btn btn-primary">
                                            <i class="la la-check"></i> {{ __('dashboard.save') }}
                                        </button>
                                        <button id="edit_btn" type="button" class="btn btn-info">
                                            <i class="la la-edit"></i> {{ __('dashboard.edit') }}
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
            $('#logo-image').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                enableResumableUpload: false,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset($setting->site_logo) }}",
                ],

            });
            $('#favicon-image').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                enableResumableUpload: false,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset($setting->site_favicon) }}",
                ],

            });
            $('#about_us_image').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                enableResumableUpload: false,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview: [
                    "{{ asset($setting->about_us_image) }}",
                ],

            });
        });

        let originalValues = {};
        $(document).on('click', '#edit_btn', function() {
            $('#edit_btn').attr('hidden', true);
            $('#submit_btn').removeAttr('hidden');
            $('#cancel_btn').removeAttr('hidden');

            $('.setting_form input').each(function() {
                originalValues[$(this).attr('name')] = $(this).val(); // Save original values
                $(this).removeAttr('readonly');
            });
            $('.setting_form textarea').each(function() {
                originalValues[$(this).attr('name')] = $(this).val(); // Save original values
                $(this).removeAttr('readonly');
            });

            $('.setting_form input').removeAttr('readonly');
            $('.setting_form textarea').removeAttr('readonly');
        });

        // when click on cancel button
        $(document).on('click', '#cancel_btn', function() {
            // remove additional text add to inputs and textarea
            // task
            $('.setting_form input').each(function() {
                const name = $(this).attr('name');
                if (originalValues[name] !== undefined) {
                    $(this).val(originalValues[name]);
                }
            });
            $('.setting_form textarea').each(function() {
                const name = $(this).attr('name');
                if (originalValues[name] !== undefined) {
                    $(this).val(originalValues[name]);
                }
            });

            $('#edit_btn').removeAttr('hidden');
            $('#submit_btn').attr('hidden', true);
            $('#cancel_btn').attr('hidden', true);
            $('.setting_form input').attr('readonly', true);
            $('.setting_form textarea').attr('readonly', true);
        });
    </script>
@endpush
