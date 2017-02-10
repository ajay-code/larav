@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="login-form">
                    <h2>Login to your account</h2>
                    <form role="form" method="POST" action="{{ url('/confirmation/resend') }}">
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

                        <div class="row">
                            <button type="submit" class="btn btn-primary col-sm-4 col-sm-offset-4">
                                Resend
                            </button>
                        </div>
                    </form>

                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
