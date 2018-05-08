<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'note_id', 'comment',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
