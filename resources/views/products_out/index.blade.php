@extends('layouts.master')

@section('content')
    <table class="table table-bordered mt-5" style="width:70%; margin:auto;">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Product Out Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($productsOutList as $item)
                {{-- @php
                    dd($productsInList);
                @endphp --}}
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->out_at}}</td>
                    <td><a href="{{route('editProductOut',$item->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('deleteProductOut', $item->id)}}" method="post">
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