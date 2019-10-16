@extends('layouts.admin')


 @section('content')

   <h1> Edit Contact </h1>
 {!! Form::model($contact, ['method'=>'PATCH', 'action'=>['ContactController@update', $contact->id]]) !!}
  <div class="form-group">
     {!! Form::label('name', 'Name: ') !!}
     {!! Form::text('name', null, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
     {!! Form::label('tel', "Tel: ") !!}
     {!! Form::number('tel', null, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
     {!! Form::label('email', "Name: ") !!}
     {!! Form::email('email', null, ['class'=>'form-control']) !!}
  </div>
  <div class="form-group">
     {!! Form::submit('Update contact', ['class'=>'btn btn-primary']) !!}
  </div>


{!! Form::close() !!}
@include('includes.form_error')
 @endsection
