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
                                <div class="col-sm-5 col-sm-offset-1">
                                    
                                    
                                    <form action="{{ url('/profile/edit') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row margin-default">
                                        <p class="label-pattern">Name</p>
                                        <p></p>
                                        <input type="text" name="name" class="form-control profile-input" value="{{ $user->name }}">
                                    </div>
                                        <div class="row margin-default">
                                            <p class="label-pattern">Country</p>
                                            <input type="text" name="country" class="form-control profile-input" value="{{ $user->country }}">
                                        </div>
                                        <div class="row margin-default">
                                            <p class="label-pattern">City</p>
                                            <input type="text" name="city" class="form-control profile-input" value="{{ $user->city }}">
                                        </div>
                                        <div class="row margin-default">
                                            <a href="{{ url('/profile/edit') }}">
                                                <button type="Submit" class="btn btn-default btn-profile pull-left">Edit</button>
                                            </a>
                                        </div>
                                    </form>
                                    <!-- <div class="row margin-default pass-con">
                                        <button class="btn btn-default btn-profile">Change Password</button>
                                        <form id="changePass">
                                            <div class="form-group">
                                                <input type="text" class="form-control profile-input" placeholder="Old password">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control profile-input" placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control profile-input" placeholder="Confirm Password">
                                            </div>
                                            <button class="btn btn-default btn-profile">Submit</button>
                                        </form>
                                    </div> -->
                                </div>  
                                <div class="col-sm-3 wishs-info-con">
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
