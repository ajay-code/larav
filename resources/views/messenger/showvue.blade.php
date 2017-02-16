@extends('layouts.master')

@section('content')
    <chat :thread="{{ $thread }}" :users="{{ $users }}" :current-user="{{ auth()->user() }}"></chat>
@stop
