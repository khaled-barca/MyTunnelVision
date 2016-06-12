<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_Invitation extends Model
{
    protected $table = 'admin_invitations';

    protected $fillable = [
        'user_id',
        'registered',
        'token'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
