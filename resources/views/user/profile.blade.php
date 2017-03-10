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
                                    <div class="user-img">
                                        <img src="{{ $user->getAvatar() }}" class="img-responsive">
                                    </div>
                                    <br>
                                    <button id="upload-pic-button" class="btn btn-block btn-default" data-toggle="modal" data-target="#upload-pic">Change</button>
                                    @if ($user->password)
                                        <a href="{{ url('/password/change') }}">
                                            <button class="btn btn-default btn-profile">Change Password</button>
                                        </a>
                                    @endif
                                </div>  
                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="row margin-default">
                                        <p class="label-pattern">Name</p>
                                        <p>{{ $user->name }}</p>
                                    </div>
                                    <div class="row margin-default">
                                        <p class="label-pattern">Email</p>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                        @if($user->city)
                                            <div class="row margin-default">
                                                <p class="label-pattern">Country</p>
                                                {{ $user->country }}
                                            </div>
                                        @endif
                                        @if($user->city)
                                            <div class="row margin-default">
                                                <p class="label-pattern">City</p>
                                                {{ $user->city }}
                                            </div>
                                        @endif
                                        <div class="row margin-default">
                                            <a href="{{ url('/profile/edit') }}">
                                                <button class="btn btn-default btn-profile pull-left">Edit</button>
                                            </a>
                                        </div>
                                    
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

    {{-- Upload Picture Model --}}

<div id="upload-pic" class="modal fade ">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Picture</h4>
      </div>
      <div class="modal-body">
                <div class="img-container" >
                    <img id="image" src="{{ $user->getAvatar() }}" alt="">
                </div>
                <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                    <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                    <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                      <span class="fa fa-upload"> Upload</span>
                    </span>
                </label>
                <span id="photo-upload-url" data-url="{{ url('/profile/photo') }}"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <button id="upload-to-server" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
