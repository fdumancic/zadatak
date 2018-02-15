<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
   use \App\Traits\Taggable;

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
