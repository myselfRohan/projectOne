@extends('layouts.master')

@section('content')
<h1>Product Category</h1>
<a href="/productcategorylist" class="btn btn-primary">View</a>


<div class="col-md-4 offset-md-4">

     @if(session()->has('categorysuccess'))
        <div class="alert alert-success">
            {{session()->get('categorysuccess')}}
        </div>
        {{session()->forget('categorysuccess')}}
    @endif

    <form method="post" action="/productcategory">
        @csrf
        <label>Name</label>
        <input type="text" class="form-control" name="name">
        @error('name')
            <li class="list">{{$message}}</li>
        @enderror
        <label>Code</label>
        <input type="text" class="form-control" name="code">
        @error('code')
            <li class="list">{{$message}}</li>
        @enderror
    
        <label>Date</label>
        <input type="date" min="2018-01-01" max="2020-12-31"  class="form-control" name="date" />
        @error('date')
            <li class="list">{{$message}}</li>
        @enderror
    
        <label>Unit Price</label>
        <input type="text"  class="form-control" name="unitprice" />
        @error('unitprice')
            <li class="list">{{$message}}</li>
        @enderror
    
        <label>Quantity</label>
        <input type="text" class="form-control" name="quantity">
        @error('quantity')
            <li class="list">{{$message}}</li>
        @enderror
        
        <br/>
    
        <button type="submit" class="btn btn-success form-control">Add</button>
    </form>
</div>

@endsection