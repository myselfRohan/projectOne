@extends('layouts.master')

@section('content')
<div class="col-md-4 offset-md-4">


    @if(session()->has('updateunit'))
        <div class="alert alert-success">
            {{session()->get('updateunit')}}
        </div>
        {{session()->forget('updateunit')}}
    @endif

    @if(session()->has('deleteunit'))
        <div class="alert alert-danger">
            {{session()->get('deleteunit')}}
        </div>
        {{session()->forget('deleteunit')}}
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach($units as $unit)
          <tr>
          
                <td>{{$unit->id}}</td>
                <td>{{$unit->name}}</td>
                
                <td><a href="unitedit/{{$unit->id}}" class="btn btn-success">Edit</a>&nbsp;&nbsp;

                    <a href="unitdelete/{{$unit->id}}" class="btn btn-danger">Delete</a>
                </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>

</div>
    


@endsection