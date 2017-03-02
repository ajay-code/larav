@extends('layouts.main') 

@section('content')
<section id="notify">
    <div class="container">
        <div class="row real-con ">
            <a href="{{ url('notifications') }}"><button class="btn btn-default  {{ active('notifications') }}">All Notifications</button></a>
            <a href="{{ url('notifications/unread') }}"><button class="btn btn-default {{ active('notifications/unread') }}">Unread Notifications</button></a>
            <div class="col-sm-12 notifications">
                    <h3 class="notifications__header">{{ $type == 'unread' ? 'Unread Notifications': 'All Notifications'}}</h3>

                    @foreach($notifications as $notification)
                        @if (isset($notification->data['bid']))
                        @if( $bid = \App\Models\Bid::find($notification->data['bid'])->load('seller', 'product'))
                            
                            <div class="col-sm-6 each-noti">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" src="{{$bid->product->getPrimaryPhoto()->thumbnailUrl()}}" alt="...">
                                        </a>
                                        <p class="pro-title"><a href="{{ url('/') }}">{{$bid->product->title}}</a></p>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><span>From: </span>{{$bid->seller->name}}</h4>
                                        <p>{{$bid->message}}</p>
                                        <p class="specific-color">${{$bid->budget}}</p>
                                        <div class="media-footer pull-right">
                                            <span><a href="">Go to <i class="glyphicon glyphicon-envelope"></i></a></span>
                                            <span>{{$bid->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                        @else
                            <div class="col-sm-6 each-noti">
                                {!! $notification->data['message'] !!}
                            </div>
                        @endif
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 

@section('scripts')
<script>
</script>
@stop
