@extends('layouts.master')

@section('content')
    <table class="table table-bordered mt-5" style="width:70%; margin:auto;">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Product In Date</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($productsInList as $item)
                {{-- @php
                    dd($productsInList);
                @endphp --}}
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->in_at}}</td>
                </tr>
                
            @endforeach
            
        </tbody>
    </table>
@endsection