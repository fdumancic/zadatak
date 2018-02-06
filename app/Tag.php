<?php

namespace Notebook;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   public function notes() {
    	return $this->belongsToMany('Notebook\Note', 'tag_note');
    }

    public function search($query, $term) {
   		 $query->whereHas('title', function ($q) use ($term) {
   		 	$q->where('title', 'like', "%{$term}%");
   		});
	}
}
