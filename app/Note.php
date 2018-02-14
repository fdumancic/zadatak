<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
   public function tags() 
   {
   	return $this->belongsToMany('App\Tag', 'notes_to_tags')->withTimestamps();
      //return $this->morphToMany('App\Tag', 'taggable');
   }

   public function search($query, $term) 
   {
   	$query->whereHas('title', function ($q) use ($term) {
   	     $q->where('title', 'like', "%{$term}%");
   	});
	}

	public function user() 
   {
   	return $this->belongsTo('App\User', 'users');
   }

   public function scopePrivate($query) 
   {
      $query->where('type', 'private');
   }   

   public function scopePublic($query) 
   {
      $query->where('type', 'public');
   }    


}
