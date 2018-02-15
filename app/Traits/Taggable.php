<?php

namespace App\Traits;

use App\Scopes\NoTagScope;
use App\Tag;
use App\WithTagScope;
use Auth;
use Request;

trait Taggable
{
	public function tags() {

        return $this->morphToMany('App\Tag', 'taggable');
    }

    public static function bootTaggable()
	{
		static::addGlobalScope(new WithTagScope);
	}

	public static function withoutTags()
	{
		//
	}

}