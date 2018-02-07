<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\middleware;
use Notebook\Note;
use Notebook\Tag;

Route::get('/', function () {
	
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//korisnici

Route::get('/users', function() {
	$data['data']=DB::table('users')->get();
	return json_encode($data);
});

Route::get('/users/me', 'UsersController@myself')->middleware('auth');

Route::get('/users/{id}/', function($id) {
	$data = DB::table('users')->where('id', $id)->get();
    return json_encode($data);
});

//Route::get('/users/{id}/notes', 'UsersController@public_notes');

Route::get('/users/{id}/notes', function($id) {
	$data = DB::table('notes')->where([
				['user_id', '=', $id],
				['type', '=', 'public'],
			])->get();
    return json_encode($data);
});


//Biljeske

/*Route::get('/notes', function() {
	$data['data']=DB::table('notes')->orderBy('title', 'asc')->paginate(10);
	return json_encode($data);
});*/

/*Route::get('/notes', function() {
	if(request()->has('title')) {
		$data = Notebook\Note::where('title', request('title'))->paginate(3)->appends('title', request('title'));
	} else {
		$data = Notebook\Note::paginate(3);
	} 
	return json_encode($data);
});*/


Route::get('/notes', 'NotesController@search')->name('notes')->middleware('auth');

Route::post('/notes', 'NotesController@store')->middleware('auth');


Route::put('/notes/{id}', 'NotesController@update')->middleware('auth');

Route::get('/notes/{id}', function($id) {
		$data = DB::table('notes')->where('id', $id)->get();
    	return json_encode($data);
})->middleware('auth');



//tagovi

/*Route::get('/tags', function() {
		$data['data']=DB::table('tags')->orderBy('tag', 'asc')->paginate(10);
		return json_encode($data);
});*/

Route::get('/tags', 'TagsController@search')->name('tags')->middleware('auth');

Route::get('/tags/{id}/notes', function($id) {
	if($id>0 && $id<5){
	$note = tag::find($id)->notes;
    	return $note;
    } else {
    	return 'wrong tag id';
    }

})->middleware('auth');