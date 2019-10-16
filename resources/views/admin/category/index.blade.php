@extends('layouts.admin')

@section('content')

 <h1> Category </h1>
<div class ="col-sm-6">
     {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoryController@store']) !!}
         <div class="form-group">
            {!! Form::label('name', "Name: ") !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
         </div>
         <div class="form-group">
            {!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}
         </div>
     {!! Form::close() !!}
</div>



<div class ="col-sm-6">
      <table class="table">
          <tr>
             <th> ID </th>
             <th> Name </th>
             <th> Created </th>
          </tr>
       @if($categories)
         @foreach ($categories as $category)
           <tr>
              <td> {{$category->id}} </td>
              <td> <a href="{{route('product.show', ['id' => $category->id])}}"> {{$category->name}} </a>  </td>
              <td> {{$category->created_at->diffForHumans()}} </td>
              <td>
              {!! Form::open(['method'=> 'DELETE', 'action'=> ['AdminCategoryController@destroy', $category->id]]) !!}
                 <div class = "form-group"  >
                     {!! Form::submit('Delete',  ['class' => 'btn btn-danger']) !!}
                 </div>
              {!! Form::close() !!}

            </td>
            <td>
          {!! Form::open(['method'=>'GET', 'action'=>['AdminCategoryController@edit', $category->id]]) !!}
                <div class = "form-group"  >
                      {!! Form::submit('Update',  ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            </td>
           </tr>

         @endforeach

      @endif

      </table>

</div>

@endsection
