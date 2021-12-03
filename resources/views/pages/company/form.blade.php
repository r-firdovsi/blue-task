@extends('layouts.main')

@section('page-level-css')

@stop

@section('header')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{__('main.dashboard')}}</li>
            <li class="breadcrumb-item active">{{__('main.companies')}}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row gutters justify-content-center">
        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-6 col-12">
            @if(isset($company))
                <form method="POST" action="{{ route('companies.update', $company->id) }}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @else
                        <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                            @endif
                            @csrf

                            <div class="card m-0">
                                <div class="card-header">
                                    <div class="card-title">{{__('main.add')}}</div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>{{__('main.name')}}</label>
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="{{__('main.name')}}"
                                               value="{{ $company->name ?? old('name') }}"
                                               autocomplete="name"
                                               autofocus required/>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('main.email')}}</label>
                                        <input type="text" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="{{__('main.email')}}"
                                               value="{{ $company->email ?? old('email') }}"
                                               autocomplete="email"
                                               autofocus/>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('main.weblink')}}</label>
                                        <input type="text" name="weblink"
                                               class="form-control @error('weblink') is-invalid @enderror"
                                               placeholder="{{__('main.weblink')}}"
                                               value="{{ $company->weblink ?? old('weblink') }}"
                                               autocomplete="weblink"
                                               autofocus/>

                                        @error('weblink')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('main.logo')}}</label>
                                        <input type="file" name="logo"
                                               class="form-control @error('logo') is-invalid @enderror"
                                               placeholder="{{__('main.logo')}}" autofocus/>

                                        @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <button type="submit"
                                            class="btn btn-primary float-right">{{__('main.save')}}</button>
                                </div>
                            </div>
                        </form>
        </div>
    </div>
@endsection

@section('page-level-scripts')@endsection
