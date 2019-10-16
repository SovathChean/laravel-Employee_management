@extends('layouts.admin')


 @section('content')

   <h1> Edit Category </h1>
 {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoryController@update', $category->id]]) !!}
  <div class="form-group">
     {!! Form::label('name', 'Name: ') !!}
     {!! Form::text('name', null, ['class'=>'form-control']) !!}
  </div>
  <div>
     {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
  </div>

{!! Form::close() !!}
 @endsection
