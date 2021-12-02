@extends('layouts.main')

@section('page-level-css')

@stop

@section('header')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">{{__('main.dashboard')}}</li>
            <li class="breadcrumb-item active">{{__('main.employees')}}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row gutters justify-content-center">
        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-6 col-12">
            @if(isset($employee))
                <form method="POST" action="{{ route('employees.update', $employee->id) }}"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @else
                        <form method="POST" action="{{ route('employees.store') }}">
                            @endif
                            @csrf

                            <div class="card m-0">
                                <div class="card-header">
                                    <div class="card-title">{{__('main.add')}}</div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>{{__('main.firstname')}}</label>
                                        <input type="text" name="firstname"
                                               class="form-control @error('firstname') is-invalid @enderror"
                                               placeholder="{{__('main.firstname')}}"
                                               value="{{ $employee->firstname ?? old('firstname') }}"
                                               autocomplete="name"
                                               autofocus required/>

                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('main.lastname')}}</label>
                                        <input type="text" name="lastname"
                                               class="form-control @error('lastname') is-invalid @enderror"
                                               placeholder="{{__('main.lastname')}}"
                                               value="{{ $employee->lastname ?? old('lastname') }}"
                                               autocomplete="name"
                                               autofocus required/>

                                        @error('lastname')
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
                                               value="{{ $employee->email ?? old('email') }}"
                                               autocomplete="email"
                                               autofocus/>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('main.phone')}}</label>
                                        <input type="text" name="phone"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               placeholder="{{__('main.phone')}}"
                                               value="{{ $employee->phone ?? old('phone') }}"
                                               autocomplete="email"
                                               autofocus/>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('main.company')}}</label>
                                        <select name="company" id="company"
                                                class="form-control @error('company') is-invalid @enderror">
                                            <option value="">{{__('main.selectCompany')}}</option>
                                            @foreach($companies as $company)
                                                <option
                                                    @if((isset($employee) && $employee->company && $employee->company->id == $company->id) || (old('company') == $company->id)) selected
                                                    @endif
                                                    value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('company')
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
