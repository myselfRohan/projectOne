@extends('layouts.master')

@section('content')
{{-- <div class="col-md-4 offset-md-4">
    <a href="/product" class="btn btn-success">Product</a>
    <a href="/productcategory" class="btn btn-primary">Productcategory</a>
    <a href="/unit" class="btn btn-success">Unit</a>
</div> --}}

<div class="jumbotron" style="margin:auto">
  <div style="width:50%; margin:auto">
    <h1 class="display-4"><strong>Crud Project</strong></h1>
    <p class="lead">This is a CRUD PROJECT</p>
    <hr class="my-4">
    <p><strong>Can Create Read Update and Delete a Product</strong></p>
    <a href="/product" class="btn btn-success">Product </a>
    <a href="/productcategory" class="btn btn-primary">Product Category</a>
    <a href="/productcalculate" class="btn btn-primary">Product Calculation</a>
    <a href="/unit" class="btn btn-success">Unit</a>
  </div>

</div>

@endsection