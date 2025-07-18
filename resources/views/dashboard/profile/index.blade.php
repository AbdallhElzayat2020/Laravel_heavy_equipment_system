@extends('layouts.dashboard.app')
@section('title')
    {{ __('dashboard.profile') }}
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.profile') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{{ __('dashboard.dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.profile.index') }}">
                                        {{ __('dashboard.profile') }}</a>
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
                                <div class="card-text">

                                </div>

                                <form action="{{ route('dashboard.profile.update', auth()->user()->id) }}" method="post">

                                    @csrf
                                    @method('PUT')
                                    <div class="card-body shadow mb-4" style="min-width: 100ch">
                                        <h2>{{ __('dashboard.profile') }}</h2><br><br>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label> {{ __('dashboard.name') }}</label>
                                                    <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control">
                                                    @error('name')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>{{ __('dashboard.email') }}</label>
                                                    <input type="text" value="{{ auth()->user()->email }}" name="email" class="form-control">
                                                    @error('email')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>{{ __('dashboard.password') }}</label>
                                                    <input type="password" value="" name="password" placeholder="Enter  Password To Confirm"
                                                        class="form-control">
                                                    @error('password')
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


