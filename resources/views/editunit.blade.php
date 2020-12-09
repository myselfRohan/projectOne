@extends('layouts.master')

@section('content')
<h1>Unit</h1>
<a href="/unitlist" class="btn btn-success">View</a>
<div class="col-md-4 offset-md-4">

    <form method="post" action="/unitupdate/{{$unit->id}}">
        @csrf
        @method('put')
        <label>Name</label>
        <input type="text" class="form-control" name="name" value={{$unit->name}} >
        <li class="list">
    
        <br/>
     
    
        <button type="submit" class="btn btn-success form-control">Update</button>
    </form>
</div>


@endsection