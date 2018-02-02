@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
  <h1>Notes:</h1>
  <form action="/insert" mathod="post">
    <div class="form-group">
         <label for="title">Title:</label>
         <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
      <label for="note">Body:</label>
      <textarea class="form-control" rows="5" name="note" id="note"></textarea>
    </div>
      <div class="form-group">
      <label for="type">Type:</label>
      <select class="form-control" name="note" id="type">
        <option>Public</option>
        <option>Private</option>
      </select>
    </div>
        <label for="title">Tags:</label>
        <div class="checkbox">
          <label><input type="checkbox" value="">JS</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" value="">PHP</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" value="">HTML</label>
        </div>
      </form>
</div>

@endsection


