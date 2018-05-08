<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'slug', 'user_id', 'note', 'visibility',
    ];
}
