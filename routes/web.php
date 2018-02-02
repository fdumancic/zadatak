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

Route::get('/users/{id}/', function($id) {
	$data = DB::table('users')->where('id', $id)->get();
    	return json_encode($data);
});

//Biljeske

/*Route::get('/notes', function() {
	$data['data']=DB::table('notes')->get();
	return json_encode($data);
});*/

Route::post('/notes', 'NotesController@insert');


Route::put('notes/{id}', 'NotesController@update');

Route::get('/notes', 'NotesController@index');

//tagovi

Route::get('/tags/{id}/notes', function($id) {
	$note = tag::find($id)->notes;
    	return $note;
});