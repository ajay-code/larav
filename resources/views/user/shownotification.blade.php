@extends('layouts.main') 

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 notifications">
                    <h3 class="notifications__header">All Notifications...</h3>
                        <table class="table table-hover">
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
                            <tr> 
                                <td>
                                    <a href=""><i class="fa fa-remove" ></i></a>   
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
                                @if ($notification->markAsRead())
                                @endif
                        </table>

                    
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
