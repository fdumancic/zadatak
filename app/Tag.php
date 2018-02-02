<?php

namespace Notebook;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   public function notes()
    {
    	return $this->belongsToMany('Notebook\Note', 'tag_note');
    }
}
