@extends('layouts.admin')

@section('content')
 <h1> Edit Transaction </h1>

 <div class ="col-sm-6">
   {!! Form::model($transact, ['method' => 'PATCH', 'action' => ['TransactionController@update', $transact->id]]) !!}
   <div class = "form-group" >
           {!! Form::label('customer', 'Customer Name: ') !!}
           {!! Form::text('customer', null, ['class'=>'form-control']) !!}

   </div>
   <div class = "form-group" >
           {!! Form::label('category_id', 'Product') !!}
           {!! Form::select('category_id', [''=>'Choose categories'] + $categories, null, ['class'=>'form-control']) !!}
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
 {!! Form::close() !!}
</div>

@include('includes.form_error')
@endsection
