@extends('layouts.admin')

@section('content')
   <h1> Edit Employee </h1>

<div class="row">
     <div class="col-sm-3">

         <img src ="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class ="img-responsive img-rounded" >

     </div>
  <div class="col-sm-9">
   {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id]]) !!}
   <div class = "form-group" >
           {!! Form::label('name', 'Name: ') !!}
           {!! Form::text('name', null, ['class'=>'form-control']) !!}

   </div>
   <div class = "form-group" >
           {!! Form::label('category_id', 'Product') !!}
           {!! Form::select('category_id', [''=>'Choose categories'] + $categories, null, ['class'=>'form-control']) !!}
   </div>
   <div class = "form-group" >
           {!! Form::label('is_active', 'Status: ') !!}
           {!! Form::select('is_active', [1=>'Active', 0 =>'Not active'], 0, ['class'=>'form-control']) !!}

   </div>
   <div class = "form-group" >
      {!! Form::label('photo_id',  'Photo') !!}
       {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
   </div>


   <div class = "form-group" >
           {!! Form::label('email', 'Email: ') !!}
           {!! Form::email('email', null, ['class'=>'form-control']) !!}
   </div>

   <div class = "form-group" >
           {!! Form::label('password', 'Password: ') !!}
           {!! Form::password('password',['class'=>'form-control']) !!}
   </div>
   <div class = "form-group"  >
            {!! Form::submit('Create-Employee',  ['class' => 'btn btn-primary']) !!}
  </div>
  {!! Form::close() !!}
</div>
</div>

<div class ="row">

@include('includes.form_error')
</div>
@endsection
