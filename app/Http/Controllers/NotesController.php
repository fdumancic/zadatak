<?php

namespace Notebook\Http\Controllers;


use Illuminate\Auth\Middleware\Auth;
use Illuminate\Http\Request;
use Notebook\Note;
use Notebook\Tag;
use Post;

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
    public function insert(Request $req)
    {
        /*if(Auth::check()) 
            {
                $title = $req->input('title');
                $note = $req->input('note');

                $data = array('title'=>$title, 'note'=>$note);

                DB::table('notes')->insert($data);

                echo "Success";


            }*/



        
    }
    
    public function index()
    {
        $tag = Note::find(1)->tags;
        return $tag;


    }
}
    

