<?php

namespace Notebook\Http\Controllers;

use Request;
use Auth;

use Notebook\Note;
use Notebook\Tag;

class TagsController extends Controller
{
    public function showNotesWithTag($id)
    {
    	if($id>0 && $id<5){
            $note = tag::find($id)->notes;
            return $note;
    } else {
        return 'wrong tag id';
    }
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
