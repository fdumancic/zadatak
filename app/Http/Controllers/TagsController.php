<?php

namespace App\Http\Controllers;

use App\Note;
use App\Tag;
use Auth;
use Request;


class TagsController extends Controller
{   
/*    use \App\Traits\Taggable;*/

    public function showNotesWithTag($id)
    {

        $data = Tag::find($id)
        ->notes()
        ->where([
            ['tag_id', '=', $id],
            ['user_id', '=', Auth::id()],
        ])
        ->orWhere([
            ['tag_id', '=', $id],
            ['type', '=', 'public'],
        ])
        ->orderBy('id')
        ->get();

        return $data;

        

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

        return $data;


    }

}
