<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_Invitation extends Model
{
    protected $table = 'admin_invitations';

    protected $fillable = [
        'email',
        'registered'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
