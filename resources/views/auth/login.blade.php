@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="login-form">
                    <h2>Login to your account</h2>
                    <span class="pull-right">
                        <a href="{{ url('/confirmation/resend') }}">Resend Varification Email</a>
                    </span>
                    <br>
                    <br>
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" name="email"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                            <input id="password" type="password" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div>
                                    <span>
                                        <label>
                                            <input type="checkbox" class="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                        </label>

                                        <a class="btn btn-link pull-right" href="{{ url('/password/reset') }}">
                                            Forgot Your Password?
                                        </a>
                                    </span>
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary col-sm-4 col-sm-offset-4">
                                Login
                            </button>
                        </div>
                    </form>

                    <div class="margin-20">
                        <a class="btn btn-block btn-social btn-google" href="{{url('/login/google')}}">
                            <span class="fa fa-google"></span>
                            Sign in with Google
                        </a>

                        <a class="btn btn-block btn-social btn-facebook" href="{{url('/login/facebook')}}">
                            <span class="fa fa-facebook"></span>
                            Sign in with Facebook
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
