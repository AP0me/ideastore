@include('head')
<body>
  <div class="squish-sides">
    @include('navbar', ['routes' => $routes])
    <div class="form-placer">
      <form class="login-form" method="POST">
        @csrf
        <div class="form-explane">Log into your accout</div>
        <input class="login-input" type="text" placeholder="email">
        <input class="login-input" minlength="6" type="password" placeholder="password">
        <div class="remember-me">
          <input class="login-input" name="remember" type="checkbox">
          <div class="form-explane">Remember me</div>
        </div>
        <input class="login-input" type="submit" value="Log in">
      </form>
    </div>
  </div>
</body>
</html>
