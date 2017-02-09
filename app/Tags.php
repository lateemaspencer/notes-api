<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag_title'];

    public function notes()
    {
    	return $this->belongsToMany('App\Note', 'note_tags', 'note_id', 'tags_id');
    }
}
