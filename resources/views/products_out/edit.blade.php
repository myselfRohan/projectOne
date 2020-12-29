
@extends('layouts.master')

@section('content')
<h1>Edit ProductOut</h1>
<br/>
<div class="col-md-4 offset-md-4">
    <form method="post" action="{{route('updateProductOut', $productOut)}}">
        @csrf
        @method('put')
        <label>Quantity</label>
        <input type="text" class="form-control" name="quantity" value={{$productOut->quantity}} />
        {{-- @error('quantity')
            <li class="list">{{$message}}</li>
        @enderror --}}
        

        <label>Date</label>
        <input type="date" class="form-control" name="out_at" value={{$productOut->out_at}} />
        {{-- @error('date')
            <li class="list">{{$message}}</li>
        @enderror --}}

        <br/>
        <button type="submit" class="btn btn-success form-control">Update ProductOut</button>
    </form>
</div>
@endsection