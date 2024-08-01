@include('head')
<body>
  <div class="squish-sides">
    @include('navbar', ['routes' => $routes])
    <div class="form-placer">
      <form class="signup-form" method="POST">
        @csrf
        <div class="form-explane">Create an account.</div>
        <input class="login-input" name="email" type="email" placeholder="email">
        <input class="login-input" maxlength="{{ $usersReq['unameMaxLen'] }}" name="uname" type="text" placeholder="username">
        <input class="login-input" minlength="{{ $usersReq['passwordMinLen'] }}" name="passw" type="password" placeholder="password">
        <input class="login-input" name="create" type="submit" value="Sign up">
      </form>
    </div>
  </div>
</body>
</html>
