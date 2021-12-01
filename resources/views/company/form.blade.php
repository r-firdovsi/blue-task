@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }} - {{__('main.companies')}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <a href="{{route('companies.create')}}"
                                   class="btn btn-secondary btn-sm">{{__('main.back')}}</a>
                            </div>

                            <div class="col-md-12 mt-5">
                                <form method="POST" action="{{ route('companies.store') }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('main.name') }}
                                            *</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name" value="{{ old('name') }}" required autocomplete="name"
                                                   autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('main.email') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" autocomplete="email"
                                                   autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="weblink"
                                               class="col-md-4 col-form-label text-md-right">{{ __('main.weblink') }}</label>

                                        <div class="col-md-6">
                                            <input id="weblink" type="url"
                                                   class="form-control @error('weblink') is-invalid @enderror"
                                                   name="weblink" value="{{ old('weblink') }}"
                                                   autocomplete="weblink"
                                                   autofocus>

                                            @error('weblink')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="logo"
                                               class="col-md-4 col-form-label text-md-right">{{ __('main.logo') }}</label>

                                        <div class="col-md-6">
                                            <input id="logo" type="file"
                                                   class="form-control @error('logo') is-invalid @enderror"
                                                   name="logo" value="{{ old('logo') }}"
                                                   autofocus>

                                            @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('main.save') }}
                                            </button>
                                        </div>
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
