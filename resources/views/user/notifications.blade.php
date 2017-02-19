@extends('layouts.main') 

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 notifications">
                    <h3 class="notifications__header">All Notifications...</h3>

                    @foreach($notifications as $notification)
                        @if( $bid = \App\Models\Bid::find($notification->data['bid'])->load('seller', 'product'))
                            
                        @endif
                    @endforeach
                        {{-- <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Message</th>
                                    <th>
                                        <span class="pull-right">
                                            From
                                        </span>
                                    </th>
                                       <th>
                                        <span class="pull-right">
                                            At
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                        @foreach ($user->notifications as $notification)
                            <tr class="notifications__item clickable-row"  
                                data-href="{{ url('/notifications/'.$notification->id) }}">
                                <td>
                                    <b>#{{ $loop->iteration }}</b>
                                </td>
                                <td>
                                    <span> 
                                        {{ $notification->data['message'] }}
                                    </span>
                                </td>
                                <td >
                                    <span class="pull-right">
                                        {{ $notification->data['from'] }}  
                                    </span>
                                </td>
                                <td>
                                    <span class="pull-right">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </table>
 --}}
                    
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
