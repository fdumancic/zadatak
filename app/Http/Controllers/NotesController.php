<?php

namespace Notebook\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
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
    public function index()
    {
        if(Auth::check()) 
            {
                return view('notes');
            }

        
    }
    public function AllNotes(Auth $user, Post $notes){
        $notes = $note->where("user_id", "=", $user->id)->get();
        return view('notes' , compact('notes'));
    }
}
