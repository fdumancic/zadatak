<?php

namespace App\Traits;

use App\Tag;
use Auth;
use Request;

trait Taggable
{
	public function searchTags() {

/*    	$builder = Tag::query();
        $term = Request::input('tag', '');
        if(!empty($term)){
            $builder->where('tag', 'LIKE', '%'.$term.'%');
            $data = $builder->orderBy('tag')->paginate(3);
        } else {
            $data = $builder->orderBy('created_at')->paginate(3);
        }
        return $data;*/
    }

    public function notesWithTag($id)
    {
      /*  $data = Tag::find($id)
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
*/


    }



}