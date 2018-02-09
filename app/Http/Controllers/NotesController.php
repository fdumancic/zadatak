<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Note;
use App\Rules\ValidTag;
use App\Tag;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NotesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function showNote($id)
    {
        $data = Note::find($id);
        return $data;
    }    


    public function store(ValidationRequest $request)
    {   

        $note = new Note;
        $note->user_id = Auth::id();
        $note->title = $request->input('title');
        $note->note = $request->input('note');
        $note->type = $request->input('type');
        $tags = $request->input('tag_id');
        $note->save();

        //add tags to notes
        //$tags = $request->input('tag_id');
        $tags = explode(',', $tags);
        $tag_count = count($tags);
        $number_of_tags = Tag::whereIn('id', $tags)->get()->count();
         
        if($number_of_tags == $tag_count){

            $note->tags()->attach($tags);
        }
        return 'stored';
    }

    public function update(ValidationRequest $request, $id)
    {

        $note = Note::find($id);
        $note->user_id = Auth::id();
        $note->title = $request->input('title');
        $note->note = $request->input('note');
        $note->type = $request->input('type');
        $tags = $request->input('tag_id');
        $note->save();

        //add tags to notes

        $tags = explode(',', $tags);
        $tag_count = count($tags);
        $number_of_tags = Tag::whereIn('id', $tags)->get()->count(); 

        if($number_of_tags == $tag_count){

            $note->tags()->sync($tags);
        }
        return 'updated';
    }
    
    public function search(Request $request)
    {
        $builder = Note::query();
        $term = $request->input('title', '');

        if(!empty($term)){
            $builder->where('title', 'LIKE', '%'.$term.'%');
            $data = $builder->orderBy('title')->paginate(3);
        } else {
            $data = $builder->orderBy('created_at')->paginate(3);
        }
        return $data;

    }

}
    

