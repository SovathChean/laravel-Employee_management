@extends('layouts.admin')

@section('content')
  <h1> Product </h1>
  <table class="table">
     <thead>
        <tr>
          <th>Photo</th>
          <th>ID</th>
          <th>Name</th>
          <th>category</th>
          <th>Amount</th>
          <th>Price_in</th>
          <th>Price_in</th>
          <th>measure_unit</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
     </thead>
     <tbody>
      @if($products)

         @foreach ($products as $product)
              <tr>
                  <td><img height = "50"  src="{{ $product->photo ? $product->photo->file : 'http://placehold.it/400x400'}}" alt = ""></td>
                  <td> {{$product->id}} </td>
                  <td> {{$product->name}} </td>
                  <td> {{$product->category->name}} </td>
                  <td> {{$product->amount}} </td>
                  <td> {{$product->price_in}} </td>
                  <td> {{$product->price_out}} </td>
                  <td> {{$product->measure_unit}} </td>
                  <td> {{$product->created_at->diffForHumans()}} </td>
                  <td> {{$product->updated_at->diffForHumans()}} </td>
                  <td>
                  {!! Form::open(['method'=> 'DELETE', 'action'=> ['AdminProductController@destroy', $product->id]]) !!}
                     <div class = "form-group"  >
                         {!! Form::submit('Delete',  ['class' => 'btn btn-danger']) !!}
                     </div>
                  {!! Form::close() !!}

                </td>
                <td>
                {!! Form::open(['method'=>'GET', 'action'=>['AdminProductController@edit', $product->id]]) !!}
                    <div class = "form-group"  >
                          {!! Form::submit('Update',  ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
                </td>
              
              </tr>
         @endforeach

     @endif
     </tbody>




  </table>

@endsection
