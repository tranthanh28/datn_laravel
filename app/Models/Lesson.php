<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $fillable = [
        'id', 'Namelesson','topic_id','url'
    ];
    public function topic()
    {
        return $this->belongsTo('App\Models\Topic');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
