@extends('layouts.admin')


  @section('content')

 <h1> Users </h1>


      @if($users)

         @foreach ($users as $user)

           <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
          <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-sm-2 col-md-2">
            <img src="http://thetransformedmale.files.wordpress.com/2011/06/bruce-wayne-armani.jpg"
            alt="" class="img-rounded img-responsive" />
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <p>Bruce Wayne</p> <small><cite title="Source Title">Gotham, United Kingdom  <i class="glyphicon glyphicon-map-marker"></i></cite></small>
            </blockquote>
            <p> <i class="glyphicon glyphicon-envelope"></i> masterwayne@batman.com
                <br
                /> <i class="glyphicon glyphicon-globe"></i> www.bootsnipp.com
                <br /> <i class="glyphicon glyphicon-gift"></i> January 30, 1974</p>
        </div>
    </div>
</div>
         @endforeach

     @endif












@endsection
