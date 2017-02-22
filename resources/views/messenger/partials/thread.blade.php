<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="alert col-sm-12 {{ $class }} border-bottom">
    {{-- get Image For Display --}}
    {{ $thread->id }}
        @foreach($thread->getParticipants() as $user)
            @unless(Auth::user()->id == $user->user_id)
                <div class="col-sm-4">
                    @if($user->profile_picture) 
                        <img src="{{ $user->profile_picture }}" class="thumb-round" alt="">
                    @else
                        <img src="{{ gravatar($user->email) }}" class="thumb-round" alt="">
                    @endif
                </div>
            @endunless
        @endforeach

    <div class="">
    
        <div class="col-sm-8">
        <a href="{{ route('messages.show', $thread->id) }}">
        
            @foreach($thread->getParticipants() as $user)
                @unless(Auth::user()->id == $user->user_id)
                       <h4> {{ $user->name }}</h4>
                @endunless
            @endforeach
        </a>
            <p class="email-style" style="display:block">({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</p>
            <p class="email-style"> 
                {{ $thread->latestMessage->body }}
            </p>
        </div>
    </div>
</div>
<div class="clearfix"></div>
