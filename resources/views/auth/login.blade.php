@extends('layouts.app')

@section('content')

    <div class="login-box">

        <div class="login-logo">
            <div class="text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Zimswitch Logo"
                     class="rounded mx-auto d-block">
            </div>

            <a href="{{ url('/') }}">Starter Template v5.8</a>
        </div>
        <!-- /.login-logo -->
        @include('layouts.messages')
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group has-feedback">
                        <input id="email" name="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               placeholder="Email" required autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               placeholder="Password" name="password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="row">

                        <div class="col-xs-8">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Sign In') }}
                            </button>
                        </div>
                    </div>
                </form>
                {{--@if (Route::has('password.request'))--}}
                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                {{--{{ __('Forgot Your Password?') }}--}}
                {{--</a>--}}
                {{--@endif--}}
                <br>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection