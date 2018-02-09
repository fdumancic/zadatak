<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   public function notes() {
    	return $this->belongsToMany('App\Note', 'notes_to_tags')->withTimestamps();
    }

    public function search($query, $term) {
   		 $query->whereHas('title', function ($q) use ($term) {
   		 	$q->where('title', 'like', "%{$term}%");
   		});
	}
}
