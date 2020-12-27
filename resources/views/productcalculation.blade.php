@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody id="tb">
            
            <tr class="tablerow">
                <td>
                    
                    <select class="form-control theselect ">
                        
                        <option value="none" disabled selected hidden >select Product</option>
                        @foreach($datas as $data)
                            <option value="{{$data->name}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                    
                </td>
                
                <td>
                    <input type="number" class="form-control input price" >
                </td>

                <td>
                    <input type="number" class="form-control input quantity" >
                </td>

                <td>
                    <a class="btn btn-danger delete">X</a>
                </td>
            </tr>
            
        </tbody>
    </table>

  <a class="btn btn-primary" id="addMore" style="margin-left:10px">+</a>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $("table").on('keyup', 'input', function (){
                //alert('hello');
                let a=$(this).closest('tr');
                var price = a.find('.price').val();
                var quantity = a.find(".quantity").val();
                var total = (price) * (quantity);
                // alert(total);
                a.find('.total').val(total);
            });

            // $('#delete').click(function() {
            //     $('#price, #quantity, #total, #input').val('');  
            // });

            // $("#add").click(function () { 
            //     //console.log('hello');
            //     var abc = '<tr class="tablerow">@foreach($datas as $data)<td><select class="form-control col-md-6 " id="input"><option value="0" disabled="true" selected="true">select Product</option><option>{{$data->name}}</option></select></td>@endforeach<td><input type="number" class="form-control col-md-4 input" id="price"></td><td><input type="number"class="form-control col-md-4 input" id="quantity"></td><td><input type="number" class="form-control col-md-4 input" id="total"></td><td><a class="btn btn-danger" id="delete">X</a></td></tr>'; 
            //     $('tbody').append(abc); 
            //     //console.log(markup);  
            //     //tableBody.append(markup);
            // });

            $('#addMore').on('click', function() {
                //console.log('hello');
              var data = $("#tb tr:eq(0)").clone(true).appendTo("#tb");
            //   console.log(data);
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

            
            // $("table").on('click', '.remove', function() {
            //      $(this).closest("tr").remove();
            //      console.log($(this))
            //     //  $(this).closest("tr").remove();
            // });


        });

        $("table").on('change', '.theselect', function(){     
            var selected = $(this, "option:selected").val();
            $(this).each(function(){
                $('option[value="' + selected + '"]').attr('disabled','disabled');
            });
            // alert(selected);
        });
        // function deleteMe(ele)
        // {
        
        //     let e = ele.closest('tr');
        //     console.log(e)
        //                if(e.is(':first-child')){
        //                 e.closest('tr').find('input').val('');
        //    }else{
            
        //     e.remove();
        //    }
        // }
    </script>
@endsection