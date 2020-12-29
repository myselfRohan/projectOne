@extends('layouts.master')

@section('content')
    <form action="{{route('addProductsIn')}}" method="post">
        @csrf
        <table class="table table-bordered" style="width:80%; margin:auto;">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Add</th>
                </tr>
            </thead>
            <tbody id="tb">
                
                <tr class="tablerow">
                    <td>
                        
                        <select class="form-control theselect " name="productin[]" >
                            
                            <option value="none" disabled selected hidden >select Product</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        
                    </td>
                    
                    <td>
                        <input type="number" name='price[]' class="form-control input inputPrice" >
                    </td>
    
                    <td>
                        <input type="number" name='quantity[]' class="form-control input inputQuantity" >
                    </td>
    
                    <td>
                        <a class="btn btn-danger delete">X</a>
                    </td>
                </tr>
                
            </tbody>
            <input type="date" name="inDate" class="form-control col-md-2 mb-3 mt-3" style="margin-left:140px;">
        </table>
        <button class="form-control btn btn-primary col-md-2 mt-3" style="margin-left:140px;">Submit</button>
    </form>
    

    <a class="btn btn-success " id="addMore" style="margin-left:1144px;margin-top:-80px;">+</a>

    {{-- jquery part --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('#addMore').on('click', function() {
              var data = $("#tb tr:eq(0)").clone(true).appendTo("#tb");
              data.find("input").val('');
            });

            $('table').on('click', '.delete', function(){
                let e = $(this).closest('tr');
                let rowLength = $('tr').length;
                console.log(rowLength);
                console.log(e)
                if( rowLength==2 && e.is(':first-child')){
                    e.find('.input').val('');
                }else{
                    e.remove(); 
                }
            });
        })

        $('table').on('change', '.theselect', function(){
            alert('hello');
            let id = $(this).val()
            let b = $(this).closest('tr')
            // console.log(b)
            console.log(id);
            $.ajax({    //dynamically showing the data from the database
                method: "GET",
                url: "/getdata/"+id,                           
                success: function(response){                    
                    console.log(response)
                    // $('.inputPrice').val(response.price);
                    b.find('.inputPrice').val(response.price);
                },
                error: function(){
                    alert(error);
                }   
            });
        })
    </script>
@endsection