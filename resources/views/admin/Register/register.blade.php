<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Register Form with AngularJS & Material Design</title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link href="{{asset('css/registerStyle.css')}}" rel="stylesheet">
</head>
<body>
<!-- partial:index.partial.html -->
<body ng-controller="RegisterCtrl" ng-app="myApp">
 <div class="container">
   <div id="signup">
      <div class="signup-screen">
         <div class="space-bot text-center">
            <h1>Sign up</h1>
           <div class="divider"></div>
         </div>
         {!! Form::open(['method' => 'POST', 'action' => 'RegisterController@store', 'files'=>true]) !!}

         <div class = "form-group" >
                 {!! Form::label('name', 'Name: ') !!}
                 {!! Form::text('name', null, ['class'=>'form-control']) !!}

         </div>

          <input type="hidden" name="is_active" value="{{0}}" >
          <input type="hidden" name="role_id" value="{{2}}" >

         <div class = "form-group">
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
                  {!! Form::submit('Create-Account',  ['class' => 'btn btn-primary']) !!}
          </div>
           </div>
        </div>
    </div>
</body>
<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js'></script>
<script  src="{{asset('js/loginStyle.js')}}"></script>

</body>
</html>
