<?php

namespace Notebook\Http\Controllers;

use Request;
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

    
     public function search()
    {
        $builder = Tag::query();
        $term = Request::input('tag', '');
        if(!empty($term)){
            $builder->where('tag', 'LIKE', '%'.$term.'%');
            $data = $builder->orderBy('tag')->paginate(3);
        } else {
            $data = $builder->orderBy('created_at')->paginate(3);
        }

        return json_encode($data);

    }
}
