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
       	$my_id = Auth::id();
		$data = DB::table('users')->where('id', $my_id)->get();

    	return json_encode($data);
    }

    public function read()
    {
       	$data['data']=DB::table('users')->get();
		return json_encode($data);
    }

   
  	public function showUser($id)
    {
       	$data = DB::table('users')->where('id', $id)->get();
    	return json_encode($data);
    }

    public function showUserNotes($id)
    {
       	$data = DB::table('notes')->where([
				['user_id', '=', $id],
				['type', '=', 'public'],
			])->get();
    return json_encode($data);
    }

    
   
}
