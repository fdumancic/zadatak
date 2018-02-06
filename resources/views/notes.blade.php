@extends('layouts.app')

@section('content')


{{-- <div class="container">
  <h1>Notes:</h1>
  <form method='POST' action='/notes'>
    {{ csrf_field() }}
    <div class="form-group">
         <label for="title">Title:</label>
         <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="note">Body:</label>
      <textarea class="form-control" rows="5" id="note" name="note"></textarea>
    </div>
  </form>
      <div class="form-group">
      <label for="type">Type:</label>
      <select class="form-control" id="type">
        <option>Public</option>
        <option>Private</option>
      </select>
    </div>
      <form>
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
        <div class="btn">
        <button type="submit" class="btn btn-primary">Submit</button>
          
        </div>
      </form>
</div>
 --}}
@endsection
