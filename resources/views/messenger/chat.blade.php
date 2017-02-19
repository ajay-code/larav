@foreach($messages as $message)
<div class="media">
            <a class="{{ (auth()->user()->id == $message->user->id)? 'pull-right':'pull-left'  }}" href="#">
                <img src="{{ $message->user->getAvatar() }}"
                    alt="{{ $message->user->name }}" class="img-circle">
            </a>

            <div class="media-body ">
                <div class="{{ (auth()->user()->id == $message->user->id)? 'pull-right' : 'pull-left'  }}">
                    <p > {{ $message->body }}</p>
                    <div class="text-muted">
                        <small>Posted {{ $message->created_at->diffForHumans() }} </small>
                    </div>
                </div>
            </div>
</div>

@endforeach