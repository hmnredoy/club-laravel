<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <br>
    <h3 style="color: #818181; font-family: Tw Cen MT,ROBOTO,helvetica;">Club Management System</h3>
    <!-- Icon -->
    <div class="fadeIn first">
      <img src="{{ asset('logo/club_logo.png') }}" id="icon" alt="User Icon" />
    </div>

@include('inc.message')
    <!-- Login Form -->
    <form method="post">
    	@csrf
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In"><br>
      <a href="/registration">Registration</a>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a href="#">Forgot Password?</a>
    </div>

  </div>
</div>