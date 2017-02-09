<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['user_id', 'message'];

    public function tags()
    {
    	return $this->belongsToMany(Tags::class);
    }
}
