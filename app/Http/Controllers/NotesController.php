<?php

namespace Notebook\Http\Controllers;


use Illuminate\Auth\Middleware\Auth;
use Request;
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
    public function store(Request $request)
    {   
        if(!Auth::check()) {   

            return back();
        }

        $this->validate(request(), [

                'title' => 'required',
                'body' => 'required'
        ]); 

        $data = new Note;

        $data->user_id = Auth::id();
        $data->title = $request->input('title');
        $data->note = $request->input('note');

        $data->save();

        return redirect('/notes');

    

        
    }

    public function update(Request $request, $id)
    {
        if(!Auth::check()) {   

            return back();
        }

        $this->validate(request(), [

                'title' => 'required',
                'body' => 'required'
        ]); 

        $data = Note::find($id);

        $data->user_id = Auth::id();
        $data->title = $request->input('title');
        $data->note = $request->input('note');

        $data->save();

        return redirect('/notes');
    }


    
    public function search()
    {
        $builder = Note::query();
        $term = Request::input('title', '');
        if(!empty($term)){
            $builder->where('title', 'LIKE', '%'.$term.'%');
            $data = $builder->orderBy('title')->paginate(3);
        } else {
            $data = $builder->orderBy('created_at')->paginate(3);
        }

        return json_encode($data);

    }

}
    

