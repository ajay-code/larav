<?php $count = Auth::user()->newThreadsCount(); ?>
@if($count > 0)
    <span class="notification-count">{{ $count }}</span>
@endif
