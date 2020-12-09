@extends('layouts.master')

@section('content')
<div class="col-md-8 offset-md-2">
    @if(session()->has('updateproductcategory'))
    <div class="alert alert-success">
      
        {{session()->get('updateproductcategory')}}
    
        
    </div>
    @endif

    @if(session()->has('deleteproductcategory'))
        <div class="alert alert-danger">
            
            {{session()->get('deleteproductcategory')}}
            
        </div>
    @endif
       
        
   
     {{session()->forget('deleteproductcategory')}}
   
    {{session()->forget('updateproductcategory')}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Date</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach($datas as $productcategory)
          <tr>
          
                <td>{{$productcategory->id}}</td>
                <td>{{$productcategory->name}}</td>
                <td>{{$productcategory->code}}</td>
                <td>{{$productcategory->date}}</td>
                <td>Rs:&nbsp;{{$productcategory->unitprice}}</td>
                <td>{{$productcategory->quantity}}</td>
            
                <td><a href="productcategoryedit/{{$productcategory->id}}" class="btn btn-success">Edit</a>&nbsp;&nbsp;

                    <a href="productcategorydelete/{{$productcategory->id}}" class="btn btn-danger">Delete</a>
                </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection