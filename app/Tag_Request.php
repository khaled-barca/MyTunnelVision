<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag_Request extends Model
{
    protected $table = 'tag_requests';
    protected $fillable = [
        'tag',
        'accepted'
    ];
}
