<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function myself()
    {
      $my_id = Auth::id();
      $data = User::find($my_id);
      return $data;
    }

    public function read()
    {
      $data = User::get();
		  return $data;
    }

   
  	public function showUser($id)
    {
      $data = User::find($id);
    	return $data;
    }

    public function showUserNotes($id)
    {
      $data = Note::where([
        ['user_id', '=', $id],
        ['type', '=', 'public'],
      ])->get();
      return $data;
    }

    
   
}
