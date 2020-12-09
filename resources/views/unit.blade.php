@extends('layouts.master')

@section('content')
<h1>Unit</h1>
<a href="/unitlist" class="btn btn-success">View</a>
<div class="col-md-4 offset-md-4">

    @if(session()->has('unitsuccess'))
        <div class="alert alert-success">
            {{session()->get('unitsuccess')}}
        </div>
        {{session()->forget('unitsuccess')}}
    @endif
    <form method="post" action="/addunit">
        @csrf
        <label>Name</label>
        <input type="text" class="form-control" name="name" >
        <li class="list">
        @error('name')
            {{$message}}
        @enderror
        </li>
        <br/>
     
    
        <button type="submit" class="btn btn-success form-control">Add</button>
    </form>
</div>


@endsection