@extends('layouts.auth')

@section('content')
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf

        <div class="row justify-content-md-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="login-screen">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="{{asset('wafi/img/logo-dark.png')}}" alt="Blue Planet"/>
                        </a>

                        <h5>{{ __('Verify Your Email Address') }}</h5>

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},

                        <div class="actions mb-4">
                            <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                            .
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
