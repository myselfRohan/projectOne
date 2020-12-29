@extends('layouts.master')

@section('content')
    <form action="{{route('search')}}" class=" col-md-2 mb-3 mt-3" style="margin-left:188px;">
        <input type="search" name="inputData" class="form-control" placeholder="Search the products">
        <input type="date" name="searchDate" class="form-control mt-2" >
        <button type="submit" class="form-control btn btn-primary mt-2">Search</button>
    </form>
    <table class="table table-bordered mt-5" style="width:70%; margin:auto;">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Product In Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($results as $item)
                {{-- @php
                    dd($item);
                @endphp --}}
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->in_at}}</td>
                    <td><a href="{{route('editProductIn',$item->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('deleteProductIn', $item->id)}}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="form-control btn btn-danger col-md-5 pr-4 mt-1">Delete</button>
      
                        </form>
                      </td>
                </tr>
                
            @endforeach
            
        </tbody>
    </table>
@endsection