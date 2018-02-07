<?php

namespace Notebook;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   public function notes() {
    	return $this->belongsToMany('Notebook\Note', 'notes_to_tags');
    }

    public function search($query, $term) {
   		 $query->whereHas('title', function ($q) use ($term) {
   		 	$q->where('title', 'like', "%{$term}%");
   		});
	}
}
