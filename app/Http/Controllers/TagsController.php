<?php

namespace Notebook\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Notebook\Note;
use Notebook\Tag;

class TagsController extends Controller
{
    public function notes_with_tag()
    {
    	$note = tag::find(1)->notes;
    	return $note;
    }
}
