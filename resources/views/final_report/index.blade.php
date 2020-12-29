@extends('layouts.master')

@section('content')
    <table class="table table-bordered mt-5" style="width:70%; margin:auto;">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Quantity</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->total}}</td>
                </tr>
                
            @endforeach
            
        </tbody>
    </table>
@endsection