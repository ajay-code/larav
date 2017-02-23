@extends('layouts.message')

@section('content')
<div class="container" id="message-layout">
	@include('messenger.partials.flash')
	<div class="row">

    	<div class="col-sm-4 users-container">
			<div class="row message-title specific-border">USERS</div>
    		<div class="row message-indi-con">
    			@each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
			</div>
		</div>

		<div class="col-sm-8 messages-container">
			<div class="row message-title">MESSAGES</div>
					
	    		<chat post-url="{{ route('messages.update', $thread->id) }}" :thread="{{ $thread }}" :users="{{ $users }}" :current-user="{{ auth()->user() }}" :messages="{{ $thread->messages }}"></chat>
		</div>
	</div>
</div>
@stop
