@extends('layouts.master')

@section('content')
    <chat post-url="{{ route('messages.update', $thread->id) }}" :thread="{{ $thread }}" :users="{{ $users }}" :current-user="{{ auth()->user() }}"></chat>
@stop
