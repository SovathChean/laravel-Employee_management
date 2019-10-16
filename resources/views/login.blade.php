<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login">
  <div class="login-triangle"></div>

  <h2 class="login-header">Log in</h2>

  <form class="login-container" method="POST" action="{{ route('login') }}">
  {{csrf_field()}}
      <p><input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></p>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      <p><input id="password" type="password" placeholder="Password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"></p>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      <p><input type="submit" value="Log in"></p>

    <a href="{{ url('/logout') }}"> Log Out </a>
  </br>
    <a href="{{route('register.index')}}" > Create New Account </a>
  </form>

</div>
<!-- partial -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
