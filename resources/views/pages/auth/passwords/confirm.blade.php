@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="row justify-content-md-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-screen">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="{{asset('wafi/img/logo-dark.png')}}" alt="Blue Planet"/>
                        </a>

                        <h5>Welcome back,<br/>Please Login to your Account.</h5>
                        <div class="form-group">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <div class="actions mb-4">
                            <button type="submit" class="btn btn-primary">{{__('main.confirmPassword')}}</button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
