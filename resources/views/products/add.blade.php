@extends('layouts.master')

@section('content')
<h1>Add Product</h1>
<br/>
<div class="col-md-4 offset-md-4">
<form method="post" action="{{route('addProduct')}}">
    @csrf
    <label>Name</label>
    <input type="text" class="form-control" name="name" />
    @error('name')
        <li class="list">{{$message}}</li>
    @enderror

    <label>Price</label>
    <input type="text" class="form-control" name="price"/>
    @error('price')
        <li class="list">{{$message}}</li>
    @enderror
    <br/>
    <button type="submit" class="btn btn-success form-control">Add</button>
</form>

</div>
@endsection