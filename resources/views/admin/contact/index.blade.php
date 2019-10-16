@extends('layouts.admin')

@section('content')

 <h1> Contact </h1>

 @if (count($contacts) == 0)

   <div class ="col-sm-6">
     {!! Form::open(['method'=>'POST', 'action'=>'ContactController@store']) !!}
         <input type="hidden" name="transaction_id" value= "{{$transact->id}}" >
         <input type="hidden" name="name" value= "{{$transact->customer}}" >

         <div class="form-group">
            {!! Form::label('tel', "Tel: ") !!}
            {!! Form::number('tel', null, ['class'=>'form-control']) !!}
         </div>
         <div class="form-group">
            {!! Form::label('email', "Email: ") !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
         </div>
         <div class="form-group">
            {!! Form::submit('Add contact', ['class'=>'btn btn-primary']) !!}
         </div>
     {!! Form::close() !!}
   </div>

 @endif

@if (count($contacts) > 0)

      <table class="table">
          <tr>
             <th> ID </th>
             <th> Name </th>
             <th> Tel </th>
             <th> Email </th>
             <th> Created </th>
             <th> </th>

          </tr>
       @if($contacts)
         @foreach ($contacts as $contact)
           <tr>
              <td> {{$contact->id}} </td>
              <td> {{$contact->name}} </td>
              <td> {{$contact->tel}} </td>
              <td> {{$contact->email}} </td>
              <td> {{$contact->created_at->diffForHumans()}} </td>
              <td>
              {!! Form::open(['method'=> 'DELETE', 'action'=> ['ContactController@destroy', $contact->id]]) !!}
                 <div class = "form-group"  >
                     {!! Form::submit('Delete',  ['class' => 'btn btn-danger']) !!}
                 </div>
              {!! Form::close() !!}

            </td>
            <td>
             {!! Form::open(['method'=>'GET', 'action'=>['ContactController@edit', $contact->id]]) !!}
                <div class = "form-group"  >
                      {!! Form::submit('Update',  ['class' => 'btn btn-primary']) !!}
                </div>
             {!! Form::close() !!}
            </td>

           </tr>

         @endforeach

      @endif

      </table>



@endif

@endsection
