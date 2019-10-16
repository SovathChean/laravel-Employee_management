@extends('layouts.admin')

@section('content')


@if (count($transacts) > 0)


  <h1> Transaction </h1>

  <table class="table">
       <thead>
        <tr>
         <th> ID </th>
         <th> Customer </th>
         <th> Category </th>
         <th> Description </th>
         <th> Price </th>
         <th> Amount </th>
         <th> Buy_at </th>

        <tr>
       </thead>
       <tbody>
          @if ($transacts)

            @foreach ($transacts as $transact)
                <tr>
                   <td> {{$transact->id}}</td>
                   <td><a href="{{url("/contact/{$transact->id}")}}"> {{$transact->customer}} </a> </td>
                   <td> {{$transact->category->name}}</td>
                   <td> {{$transact->product->name}} </td>
                   <td> {{$transact->price}}</td>
                   <td> {{$transact->amount}}</td>
                   <td> {{$transact->created_at->diffForHumans()}}</td>
              @if ($transact->user_id == $users)
                   <td>
                     {!! Form::open(['method'=> 'DELETE', 'action'=> ['TransactionController@destroy', $transact->id]]) !!}
                        <div class = "form-group"  >
                            {!! Form::submit('Delete',  ['class' => 'btn btn-danger']) !!}
                        </div>
                     {!! Form::close() !!}
                   </td>
                   <td>
                     {!! Form::open(['method'=>'GET', 'action'=>['TransactionController@edit', $transact->id]]) !!}
                         <div class = "form-group"  >
                               {!! Form::submit('Update',  ['class' => 'btn btn-primary']) !!}
                         </div>
                     {!! Form::close() !!}
                   </td>
                   <td>
                     {!! Form::open(['method'=>'GET', 'action'=>['ContactController@show', $transact->id]]) !!}
                         <div class = "form-group"  >
                               {!! Form::submit('Add Contact',  ['class' => 'btn btn-primary']) !!}
                         </div>
                     {!! Form::close() !!}
                   </td>
                </tr>
                @endif
            @endforeach

          @endif
       </tbody>
@else


  <h1>No transaction </h1>

@endif
  </table>

@endsection
