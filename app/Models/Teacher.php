<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'id', 'nameTeacher',
    ];

    public function topics()
    {
        return $this->hasMany('App\Models\Topic');
    }
}
