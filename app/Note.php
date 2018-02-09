<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
   public function tags() {
   		return $this->belongsToMany('App\Tag', 'notes_to_tags')->withTimestamps();
   }

   public function search($query, $term) {
   		 $query->whereHas('title', function ($q) use ($term) {
   		 	$q->where('title', 'like', "%{$term}%");
   		});
	}

	public function user() {
   		return $this->belongsTo('App\User', 'users');
   }
}
