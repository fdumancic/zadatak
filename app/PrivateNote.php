<?php 

namespace App;

use App\Note;

class PrivateNote extends Note{

	protected static function boot()
	{
		static::addGlobalScope(new PrivateNoteScope);
		parent::boot();
	}
	
}
