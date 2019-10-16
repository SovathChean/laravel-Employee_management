@extends('layouts.admin')

 @section('content')

   <h1> Create Product </h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminProductController@store', 'files'=>true]) !!}
    <div class = "form-group" >
            {!! Form::label('name', 'Name: ') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}

    </div>
    <div class = "form-group" >
            {!! Form::label('category_id', 'Product') !!}
            {!! Form::select('category_id', [''=>'Choose categories'] + $categories, null, ['class'=>'form-control']) !!}
    </div>
    <div class = "form-group" >
            {!! Form::label('amount', "Amount: ") !!}
            {!! Form::number('amount', null, ['class'=>'form-control']) !!}

    </div>
    <div class = "form-group" >
            {!! Form::label('price_in', "Price_in: ") !!}
            {!! Form::number('price_in', null, ['class'=>'form-control']) !!}

    </div>

    <div class = "form-group" >
            {!! Form::label('price_out', "Price_out: ") !!}
            {!! Form::number('price_out', null, ['class'=>'form-control']) !!}

    </div>

    <div class = "form-group" >
            {!! Form::label('measure_unit', 'Measure_unit: ') !!}
            {!! Form::text('measure_unit', null, ['class'=>'form-control']) !!}
    </div>
    <div class = "form-group" >
       {!! Form::label('photo_id',  'Photo') !!}
       {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
    </div>
    <div class = "form-group"  >
             {!! Form::submit('Create-Employee',  ['class' => 'btn btn-primary']) !!}
   </div>

{!! Form::close() !!}

@include('includes.form_error')
 @endsection
