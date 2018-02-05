<?php

namespace Notebook\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Notebook\Note;
use Notebook\Tag;

class UsersController extends Controller
{
    public function myself()
    {
    	if (Auth::check()){

	       	$my_id = Auth::id();
			$data = DB::table('users')->where('id', $my_id)->get();
	    	return json_encode($data);

	    }
    }

    /*public function public_notes()
    {
    	

	       	$my_id = Auth::id();
	        $type = 'public';
			$data = DB::table('notes')->where([
				['user_id', '=', $my_id],
				['type', '=', $type],
			])->get();
	    	return json_encode($data);

	    
    }*/
}
