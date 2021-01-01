<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Topic extends Model implements Searchable
{
    //
    protected $fillable = [
        'id','course_id','teacher_id','NameTopic','slug','cost','address_Pic',
    ];
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','user_topic');
    }
    public function getSearchResult(): SearchResult
    {
        $url = route('topic', $this->id);

        return new SearchResult(
            $this,
            $this->NameTopic,
            $url
        );
    }
}
