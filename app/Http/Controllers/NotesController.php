<?php

namespace Notebook\Http\Controllers;


use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Notebook\Note;
use Notebook\Tag;





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
        $data = DB::table('notes')->where('id', $id)->get();
        return json_encode($data);
    }    


    public function store(Request $request)
    {   
        if(!Auth::check()) {   

            return back();
        }

        $this->validate(request(), [

                'title' => 'required',
                'note' => 'required',
                'type' => 'required',
                'id' => 'required'

        ]); 

        $note = new Note;

        $note->user_id = Auth::id();
        $note->title = $request->input('title');
        $note->note = $request->input('note');
        $note->type = $request->input('type');

        $note->save();

        //add tags to notes
        $tags = $request->input('id');
        $tags = explode(',', $tags);
        $tag_count = count($tags);


        $number_of_tags = Tag::whereIn('id', $tags)->get()->count();
         
        if($number_of_tags == $tag_count){

            $note->tags()->attach($tags);
        }
    
        return 'stored';

    

        
    }

    public function update(Request $request, $id)
    {
        if(!Auth::check()) {   

            return back();
        }

        $this->validate(request(), [

                'title' => 'required',
                'note' => 'required',
                'type' => 'required', 
                'id' => 'required'
        ]); 

        $note = Note::find($id);

        $note->user_id = Auth::id();
        $note->title = $request->input('title');
        $note->note = $request->input('note');
        $note->type = $request->input('type');

        $note->save();

        //add tags to notes
        $tags = $request->input('id');
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

        return json_encode($data);

    }

}
    

