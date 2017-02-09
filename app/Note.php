<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['user_id', 'message', 'tags'];

    //protected $table = 'note_tags';
    public function tag()
    {
    	return $this->belongsToMany(Tag::class, 'note_tags', 'note_id','tags_id');
    }
}
