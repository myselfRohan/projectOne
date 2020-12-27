@extends('layouts.master')

@section('content')
<div class="col-md-8 offset-md-2 mb-3">
  <h1>Products</h1>
  <a href="{{route('createProduct')}}" class="form-control btn btn-success col-md-5 mb-10">Add Product</a>
</div>

<div class="col-md-8 offset-md-2">
    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
          <tr>
          
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td><a href="{{route('editProduct',$product)}}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;
                  <form action="{{route('deleteProduct', $product)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="form-control btn btn-danger col-md-3 mt-1">Delete</button>

                  </form>
                </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection