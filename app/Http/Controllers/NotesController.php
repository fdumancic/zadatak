<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Models\Note;
use App\Models\Tag;
use App\Models\User;
use App\Rules\ValidTag;
use Auth;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Events\NoteCreated;
use MailController;
use App\Notifications\NoteUpdated;


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

        if(!$data){
            abort(404, 'Not found');
        }
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

        //add tags to notes

        $tags = explode(',', $tags);
        $tag_count = count($tags);
        $number_of_tags = Tag::whereIn('id', $tags)->get()->count();

        if($number_of_tags == $tag_count){
            $note->save();
            $note->tags()->attach($tags);
        }
        event(new NoteCreated($note));
        print_r('Note stored, email sent');
        
    }

    public function update(ValidationRequest $request, $id)
    {
        $note = Note::find($id);

        if(Gate::denies('update-note', [$note])){
            //return response("User can't perform this action.", 403);
            abort(403, 'Access denied');
        }

        $note->title = $request->input('title');
        $note->note = $request->input('note');
        $note->type = $request->input('type');
        $tags = $request->input('tag_id');

        //add tags to notes

        $tags = explode(',', $tags);
        $tag_count = count($tags);
        $number_of_tags = Tag::whereIn('id', $tags)->get()->count();

        if($number_of_tags == $tag_count){
            $note->save();
            $note->tags()->sync($tags);
        }
        $current_user_id = Auth::id();
        User::find($current_user_id)->notify(new NoteUpdated());
        print_r('Note updated');
    }

    public function search(Request $request)
    {
        $builder = Note::query();
        $term = $request->input('title', '');

        if(!empty($term)){
            $builder->where('title', 'LIKE', '%'.$term.'%');
            $data = $builder->orderBy('title')->paginate(10);
        } else {
            $data = $builder->orderBy('created_at')->paginate(10);
        }
        return $data;

    }

     public function showPrivate()
     {

        $data = Note::private()->get();
        return $data;
     }

      public function showPublic()
     {

        $data = Note::public()->get();
        return $data;
     }

}