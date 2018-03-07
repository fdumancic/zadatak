<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;



class Tag extends Model
{
    public function notes()
    {
    	return $this->morphedByMany('App\Models\Note', 'taggable');
    }

}
