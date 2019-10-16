@extends('layouts.admin')

@section('content')

<h1> Edit Product </h1>
<div class ="row">
  <div class="col-sm-3">

      <img src ="{{$product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}" alt="" class ="img-responsive img-rounded" >

  </div>
  <div class="col-sm-9">
  {!! Form::model($product, ['method' => 'PATCH', 'action' => ['AdminProductController@update', $product->id], 'files'=>true]) !!}
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
</div>

</div>

<div class="row">
  @include('includes.form_error')
</div>
@endsection
