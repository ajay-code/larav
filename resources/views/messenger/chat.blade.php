@foreach($messages as $message)
<div class="col-sm-12 margin-20">
<div class="media {{ (auth()->user()->id == $message->user->id)? 'col-sm-6 col-sm-offset-6':'col-sm-6'  }}">
            <a class="{{ (auth()->user()->id == $message->user->id)? 'pull-right':'pull-left'  }}" href="#">
                <img src="{{ $message->user->getAvatar() }}"
                    alt="{{ $message->user->name }}" class="img-circle">
            </a>

            <div class="media-body {{ (auth()->user()->id == $message->user->id) ? 'message-left' : 'message-right'  }}" >
                <div class="{{ (auth()->user()->id == $message->user->id)? 'pull-left' : 'pull-right'  }}">
                    <p > {!! $message->body !!}</p>
                    <div class="text-muted">
                        <small>Posted {{ $message->created_at->diffForHumans() }} </small>
                    </div>
                </div>
            </div>
</div>
</div>
@endforeach