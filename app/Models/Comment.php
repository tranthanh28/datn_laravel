<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'content', 'lesson_id','user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
