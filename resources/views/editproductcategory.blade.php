
@extends('layouts.master')

@section('content')
<h1>Edit Product</h1>

<a href="/productcategorylist" class="btn btn-primary">View</a>
<br/>
<div class="col-md-4 offset-md-4">



   <form method="post" action="/productcategoryupdate/{{$data->id}}">
       @csrf
       @method('put')
       <label>Name</label>
       <input type="text" class="form-control" name="name" value="{{$data->name}}">
       @error('name')
           <li class="list">{{$message}}</li>
       @enderror
       <label>Code</label>
       <input type="text" class="form-control" name="code" value="{{$data->code}}">
       @error('code')
           <li class="list">{{$message}}</li>
       @enderror
   
       <label>Date</label>
       <input type="date" min="2018-01-01" max="2020-12-31"  class="form-control" name="date" value="{{$data->date}}" />
       @error('date')
           <li class="list">{{$message}}</li>
       @enderror
   
       <label>Unit Price</label>
       <input type="text"  class="form-control" name="unitprice" value="{{$data->unitprice}}"/>
       @error('unitprice')
           <li class="list">{{$message}}</li>
       @enderror
   
       <label>Quantity</label>
       <input type="text" class="form-control" name="quantity" value="{{$data->quantity}}">
       @error('quantity')
           <li class="list">{{$message}}</li>
       @enderror
       
       <br/>
   
       <button type="submit" class="btn btn-success form-control">Update</button>
   </form>
</div>
@endsection