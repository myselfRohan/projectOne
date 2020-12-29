
@extends('layouts.master')

@section('content')
<h1>Edit ProductIn</h1>
<br/>
<div class="col-md-4 offset-md-4">
    <form method="post" action="{{route('updateProductIn', $productIn)}}">
        @csrf
        @method('put')
        <label>Quantity</label>
        <input type="text" class="form-control" name="quantity" value={{$productIn->quantity}} />
        @error('name')
            <li class="list">{{$message}}</li>
        @enderror
        

        <label>Date</label>
        <input type="date" class="form-control" name="in_at" value={{$test->in_at}} />
        @error('price')
            <li class="list">{{$message}}</li>
        @enderror

        <br/>
        <button type="submit" class="btn btn-success form-control">Update ProductIn</button>
    </form>
</div>
@endsection