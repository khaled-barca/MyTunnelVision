<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id',
        'body',
        'vote_count',
        'post_id'
    ];

    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function parent()
    {
        return $this->belongsTo('App\Comment');
    }

    public function children()
    {
        return $this->hasMany('App\Comment');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function votes()
    {
        return $this->hasMany('App\Comment_Vote');
    }
    public function upVotes(){
        return Comment_Vote::where(['up' => 1, 'comment_id' => $this->id])->count();
    }
    public function downVotes(){
        return Comment_Vote::where(['up' => 0, 'comment_id' => $this->id])->count();
    }

}
