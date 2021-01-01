<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
class Course extends Model implements Searchable
{
    //
    protected $fillable = [
        'id', 'NameCourse','slug',
    ];
    public function topics()
    {
        return $this->hasMany('App\Models\Topic');
    }
    public function getSearchResult(): SearchResult
    {
        $url = route('course', $this->id);

        return new SearchResult(
            $this,
            $this->NameCourse,
            $url
        );
    }

}
