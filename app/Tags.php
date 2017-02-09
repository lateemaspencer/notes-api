<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_title'];

    public function note()
    {
    	return $this->belongsToMany(Note::class);
    }

    public function getRouteKeyName()
    {
    	return 'tag_title';
    }
}
