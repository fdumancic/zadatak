<?php

use Illuminate\Http\Request;
use Illuminate\Routing\middleware;
use App\Note;
use App\Tag;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//users

Route::get('/users', 'UsersController@read')->name('users')->middleware('AuthTest'); 

Route::get('/users/me', 'UsersController@myself')->middleware('AuthTest');

Route::get('/users/{id}/', 'UsersController@showUser')->middleware('AuthTest');

Route::get('/users/{id}/notes', 'UsersController@showUserNotes')->middleware('AuthTest');


//notes

Route::get('/notes', 'NotesController@search')->name('notes')->middleware('AuthTest');

Route::post('/notes', 'NotesController@store')->middleware('AuthTest');

Route::put('/notes/{id}', 'NotesController@update')->middleware('AuthTest');

Route::get('/notes/{id}', 'NotesController@showNote')->middleware('AuthTest'); 

Route::get('/notes/show/private', 'NotesController@showPrivate')->middleware('AuthTest'); 

Route::get('/notes/show/public', 'NotesController@showPublic')->middleware('AuthTest'); 





//tags

Route::get('/tags', 'TagsController@search')->name('tags')->middleware('AuthTest');

Route::get('/tags/{id}/notes', 'TagsController@showNotesWithTag')->middleware('AuthTest');

Route::get('/tags/with/tags/get', 'TagsController@withTags')->middleware('AuthTest');