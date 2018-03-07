<?php

namespace App\Traits;

use App\Models\Note;
use App\Scopes\WithTagScope;

trait Taggable
{
	public function tags() {

        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function boot()
	{
		static::addGlobalScope(new WithTagScope);
	}

    public function scopeWithoutTags($query)
    {
        $query->withoutGlobalScope(WithTagScope::class);
    }
}
