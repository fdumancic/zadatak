<?php

namespace Notebook;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
   public function tags()
   {
   	return $this->belongsToMany('Notebook\Tag', 'tag_note');
   }

}
