
@extends('layouts.master')

@section('content')
<h1>Edit Product</h1>
<br/>
<div class="col-md-4 offset-md-4">
    <form method="post" action="{{route('updateProduct', $product)}}">
        @csrf
        @method('put')
        <label>Name</label>
        <input type="text" class="form-control" name="name" value={{$product->name}} />
        @error('name')
            <li class="list">{{$message}}</li>
        @enderror
        

        <label>Price</label>
        <input type="text" class="form-control" name="price" value={{$product->price}} />
        @error('price')
            <li class="list">{{$message}}</li>
        @enderror

        <br/>
        <button type="submit" class="btn btn-success form-control">Update Product</button>
    </form>
</div>
@endsection