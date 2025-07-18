@extends('layouts.dashboard.app')
@section('title')
    {{ __('dashboard.catalog') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.catalog') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.catalog.index') }}">
                                        {{ __('dashboard.catalog') }}</a>
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
                            <h4 class="card-title" id="row-separator-colored-controls">{{ __('dashboard.catalog') }}</h4>
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
                                <div class="card-text">

                                </div>

                                <form action="{{ route('dashboard.catalog.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body shadow mb-4" style="min-width: 100ch">
                                        <h2>{{ __('dashboard.catalog') }}</h2><br><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label> {{ __('dashboard.name') }}</label>
                                                    <input type="file" class="form-control" name="pdf" accept="application/pdf" required>                                                 
                                                    @error('pdf')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button class="btn btn-primary" type="submit">{{ __('dashboard.update') }}</button>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


