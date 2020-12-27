<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Product Crud Project</title>

    <style>
        .list{
            list-style:none;
            color:red;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/" style="color:rgba(0,0,0,.5);">Product Report</a>
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> --}}
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::routeIs('products') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('products')}}">Products </a>
            </li>
            <li class="nav-item {{ Request::routeIs('createProductsIn') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('createProductsIn')}}">Products In</a>
            </li>
            <li class="nav-item {{ Request::routeIs('productsIn') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('productsIn')}}">List Products In</a>
            </li>
            <li class="nav-item {{ Request::routeIs('createProductsOut') ? 'active' : '' }}">
                <a class="nav-link" href="{{route('createProductsOut')}}">Products Out</a>
            </li>
            <li class="nav-item {{ Request::routeIs('productsOut') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('productsOut')}}">List Products Out</a>
            </li>
          </ul>
        </div>
      </nav>
    @yield('content')
    
    
</body>
</html>