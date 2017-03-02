@extends('layouts.main')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 ">
                            <h2 class="text-center profile-heading">
                                User's Profile
                            </h2>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="user-img thumbnail">
                                        <img src="{{ $user->getAvatar() }}" class="img-responsive">
                                    </div>
                                    <a href="{{ url('password/change') }}">
                                        <button class="btn btn-default btn-profile">Change Password</button>
                                    </a>

                                </div>  
                                <div class="col-sm-4 col-sm-offset-1">
                                    
                                    <div class="row margin-default pass-con">
                                        <form id="changePass" action="{{ url('/password/change') }}" method="post">
                                            {{ csrf_field() }}

                                            <div class="form-group  {{ $errors->has('old_password') ? ' has-error' : '' }}">
                                                <input type="password" name="old_password" class="form-control " placeholder="Old password">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('old_password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <input type="password" name="password" class="form-control " placeholder="New Password">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input type="password"  class="form-control " name="password_confirmation" placeholder="Confirm Password">
                                            </div>
                                            <button class="btn btn-default btn-profile">Reset Password</button>
                                        </form>
                                    </div>
                                </div>  
                                <div class="col-sm-3 col-sm-offset-1 wishs-info-con">
                                    <div class="wishs-info">
                                        <h4>Wishes Summary</h4>
                                        
                                        <p><span>Total Wishes</span><span class="pull-right profile-digits">{{ $user->total }}</span></p>
                                        <p><span>Wishes Completed</span><span class="pull-right profile-digits">{{ $user->completed }}</span></p>
                                        <p><span>Wishes Un-Completed</span>
                                            <span class="pull-right profile-digits">
                                                {{ $user->total - $user->completed }}
                                            </span>
                                        </p>

                                    </div>
                                </div>  
                            </div>

                </div>
            </div>
        </div>
    </section>

    <br>
    <br>
@endsection
