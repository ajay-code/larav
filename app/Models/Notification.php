<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $table;
    protected $hidden = ['from_user_id', 'to_user_id']; // Hide relationship columns

    public function __construct()
    {
        $this->table = config('notification.table_name');
    }

    /**
     * From User Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from()
    {
        return $this->belongsTo(config('notification.user_model'), 'from_user_id');
    }

    /**
     * To User Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function to()
    {
        return $this->belongsTo(config('notification.user_model'), 'to_user_id');
    }

    /**
     * Scope for a notification to $userId for $url that is not read,
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeForIdAndUrl($query, $userId, $url)
    {
        return $query->where('to_user_id', '=', $userId)
            ->where('url', '=', $url)
            ->where('read', '=', false);
    }

    /**
     * Scope for unread notifications
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeUnread($query)
    {
        return $query->where('read', '=', false);
    }

}
