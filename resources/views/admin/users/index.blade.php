@extends('layouts.admin')


  @section('content')

 <h1> Users </h1>

  <table class="table">
     <thead>
        <tr>
          <th>Photo</th>
          <th>ID</th>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
     </thead>
     <tbody>
      @if($users)

         @foreach ($users as $user)
              <tr>
                  <td><img height = "50"  src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt = ""></td>
                  <td> {{$user->id}} </td>
                  <td><a href="{{route('transaction.show', ['id'=> $user->id])}}"> {{$user->name}} </a> </td>
                  <td> {{$user->role->role}} </td>
                  <td> {{$user->email}} </td>
                  <td> {{$user->created_at->diffForHumans()}} </td>
                  <td> {{$user->updated_at->diffForHumans()}} </td>
                  <td>
             @if (auth()->user()->role_id == 1)
                  {!! Form::open(['method'=> 'DELETE', 'action'=> ['AdminUsersController@destroy', $user->id]]) !!}
                     <div class = "form-group"  >
                         {!! Form::submit('Delete',  ['class' => 'btn btn-danger']) !!}
                     </div>
                  {!! Form::close() !!}

                </td>
                <td>
                {!! Form::open(['method'=>'GET', 'action'=>['AdminUsersController@edit', $user->id]]) !!}
                    <div class = "form-group"  >
                          {!! Form::submit('Update',  ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
              </td>

            @if ($user->is_active == 1)
              <td>
                {!! Form::open(['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id]]) !!}


                   <input type="hidden" name="is_active" value="0">
                   <input type="hidden" name="id" value="{{$user->id}}">
                   <input type="hidden" name="email" value="{{$user->email}}">
                   <input type="hidden" name="name" value="{{$user->name}}">
                   <input type="hidden" name="role_id" value="{{$user->role_id}}">
                   <input type="hidden" name="password" value="{{$user->password}}">
                   <input type="hidden" name="photo_id" value="{{$user->photo_id}}">


                        <div class="form-group">
                            {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                        </div>
                   {!! Form::close() !!}
         </td>
                 @else
           <td>
                   {!! Form::open(['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id]]) !!}


                   <input type="hidden" name="is_active" value="1">
                   <input type="hidden" name="id" value="{{$user->id}}">
                   <input type="hidden" name="email" value="{{$user->email}}">
                   <input type="hidden" name="name" value="{{$user->name}}">
                   <input type="hidden" name="role_id" value="{{$user->role_id}}">
                   <input type="hidden" name="password" value="{{$user->password}}">
                   <input type="hidden" name="photo_id" value="{{$user->photo_id}}">

                   <div class="form-group">
                       {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                   </div>
                   {!! Form::close() !!}

        </td>


               @endif

              </tr>

            @endif

         @endforeach

     @endif
     </tbody>




  </table>




@include('includes.form_error')

@endsection
