@extends('layouts.admin')

@section('content')
 <h1> Create Transaction </h1>

 <div class ="col-sm-6">
   {!! Form::open(['method' => 'POST', 'action' => 'TransactionController@store']) !!}

   <div class = "form-group" >
           {!! Form::label('customer', 'Customer Name: ') !!}
           {!! Form::text('customer', null, ['class'=>'form-control']) !!}

   </div>
   <div class = "form-group" >
           {!! Form::label('category_id', 'Catagories: ') !!}
           {!! Form::select('category_id', [''=>'Choose categories'] + $categories, null, ['class'=>'form-control', 'id'=>'categoryID', 'value'=>'$categories->id']) !!}


   </div>

   <div class = "form-group" >
           {!! Form::label('product_id', 'Product:') !!}
           {!! Form::select('product_id', [''=>'Choose Product'], null, ['class'=>'form-control', 'id'=>'productID']) !!}
   </div>

   <div class = "form-group" >
           {!! Form::label('price', "Price: ") !!}
           {!! Form::number('price', null, ['class'=>'form-control']) !!}

   </div>

   <div class = "form-group" >
           {!! Form::label('amount', "Amount: ") !!}
           {!! Form::number('amount', null, ['class'=>'form-control']) !!}

   </div>

   <div class = "form-group"  >
            {!! Form::submit('Create-Transaction',  ['class' => 'btn btn-primary']) !!}
  </div>

 </div>
{!! Form::close() !!}
@include('includes.form_error')
@endsection
@section('body_script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#categoryID').change(function(){
            var productID = $(this).val();
            console.log(productID);
            if(productID){
                $.ajax({
                type:"GET",

                  url:"{{url('/get')}}?category_id="+productID,

                success:function(res){
                    if(res){
                        $("#productID").empty();
                        $("#productID").append('<option value="">Choose Product</option>');
                        $.each(res,function(key,value){
                            $("#productID").append('<option value="'+key+'">'+value+'</option>');
                        });

                     }else{
                         $("#productID").append('<option  value= "">  Choose Product </option>');
                         // $("#productID").append('<option value="'+key+'">'+value+'</option>');

                    }
                }
                });
            }
        });
    });

</script>
@endsection
