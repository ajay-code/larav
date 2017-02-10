@extends('layouts.main')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="">
                                    <input id="name" type="text"  name="name" placeholder="Name"
                                           value="{{ old('name') }}"
                                           required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="">
                                    <input id="email" type="email"  name="email" placeholder="Email Address"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                                <div class="">
                                    <input id="password" type="password"  name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="">

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                            </div>

                            <div class="row">
                                    <button type="submit" class="col-sm-4 col-sm-offset-4">
                                        Signup
                                    </button>
                            </div>

                            <div class="margin-20">
                                <a class="btn btn-block btn-social btn-google" href="{{url('/login/google')}}">
                                    <span class="fa fa-google"></span>
                                    Sign up with Google
                                </a>

                                <a class="btn btn-block btn-social btn-facebook" href="{{url('/login/facebook')}}">
                                    <span class="fa fa-facebook"></span>
                                    Sign up with Facebook
                                </a>

                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
