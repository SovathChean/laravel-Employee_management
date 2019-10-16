@extends('layouts.admin')

@section('content')


@if (count($contacts) == 0)
   <h1 text-align = "center">  No Contact Record  </h1>
@endif

@if (count($contacts) > 0)
  <h1> Contact </h1>
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
           </tr>

         @endforeach

      @endif

      </table>


@endif


@endsection
