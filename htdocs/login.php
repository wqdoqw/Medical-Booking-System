<?php
session_start();
include('already_login.php');
include("captcha_generator.php");
$_SESSION['captcha'] = simple_php_captcha();
if(isset($_COOKIE["account"]) && isset($_COOKIE["password"])){
   echo '    
  <section class="homesection">
    <div id="title">
        <h1>Login to the system</h1>
        <br>
    </div>
    <div id="loginForm">
      <form method="POST" action="process.php">
        <div class="form-contentOne">
           <input type="text" name="username" placeholder="Email Address" class="l-form-username form-control" id="l-form-username" value="'. $_COOKIE["account"] .'" required>
         </div>
         <div class="form-contentTwo">
             &nbsp;
             <input type="password" name="password" placeholder="Password" class="l-form-password form-control" id="l-form-password" value="'. $_COOKIE["password"] .'" required>
         </div>
         <div class="input_captcha">
                    &nbsp;
             <input type="text" name="captcha" placeholder="please type in words below" 
             class="l-form-password form-control" id="l-form-captcha" maxlength="10" required>
         </div>
          <div class="captcha">
              <img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">
         </div>
         <br>
         <div class="form-contentFour">
             <label>Your Role:</label>
             <select class="select_role" name="role">
              <option value="patient">Patient</option>
              <option value="doctor">Doctor</option>
            </select>
         </div>
                  <div class="clearfix"></div>
         <div class="form-contentFive">
            <input type="checkbox" name="rememberMe" value="remember-me" checked> Remember Me
         </div>
         <div class="form-contentThree">
            <input type="submit" value="Sign in" name="submit" class="btn"/>
             &nbsp;&nbsp;    
         </div>
         <br>
       </form>
    </div>
    <a href="forget_password.php">Forget Password?</a>
     &nbsp;&nbsp;&nbsp;
    <a href="index.php">Back To Home Page</a>
    
  </section>  ';
}else{
   echo '    
  <section class="homesection">
    <div id="title">
        <h1>Login to the system</h1>
        <br>
    </div>
    <div id="loginForm">
      <form method="POST" action="process.php">
        <div class="form-contentOne">
           <input type="text" name="username" placeholder="Email Address" class="l-form-username form-control" id="l-form-username" required autofocus>
         </div>
         <div class="form-contentTwo">
             <input type="password" name="password" placeholder="Password" class="l-form-password form-control" id="l-form-password" required>
         </div>
         <div class="input_captcha">
                    &nbsp;
             <input type="text" name="captcha" placeholder="please type in words below" 
             class="l-form-password form-control" id="l-form-captcha" maxlength="10" required>
         </div>
          <div class="captcha">
              <img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">
         </div>
         <br>
         <div class="form-contentFour">
             <label>Your Role:</label>
             <select class="select_role" name="role">
              <option value="patient">Patient</option>
              <option value="doctor">Doctor</option>
            </select>
         </div>
                  <div class="clearfix"></div>
         <div class="form-contentFive">
            <input type="checkbox" name="rememberMe" value="remember-me"> Remember Me
         </div>       
         <div class="form-contentThree">
            <input type="submit" value="Sign in" name="submit" class="btn"/>
             &nbsp;&nbsp;    
         </div>
         <br>
       </form>
    </div>
    <a href="forget_password.php">Forget Password?</a>
     &nbsp;&nbsp;&nbsp;
    <a href="index.php">Back To Home Page</a>
    
  </section>  ';
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>Login to the system</title>
    <!-- font family -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <!-- style sheet -->
    <link href="css/login.css" rel="stylesheet"/>
        <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
     <!--jquery link-->
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      body, html {
          height: 100%;
          font-family: "Inconsolata", sans-serif;
          }
          .bgimg {
              background-position: center;
              background-size: cover;
              background-image: url("img/bg.jpg");
              min-height: 100%;
          }
          .menu {
              display: none;
          }
          p{
            font-size: 2em;
          }

          a{
            font-size: 1.5em;
          }
          #facebook_icon:hover{
            opacity: 0.7;
          }
      </style>          
</head>

<body>
   <!-- Links (sit on top) -->
<div class="w3-top">
  <div class="w3-row w3-padding w3-black">
    <div class="w3-col s3">
      <a href="index.php" class="w3-button w3-block w3-black">HOME</a>
    </div>
    <div class="w3-col s3">
      <a href="login.php" class="w3-button w3-block w3-black">Sign In</a>
    </div>
    <div class="w3-col s3">
      <a href="register.php" class="w3-button w3-block w3-black">Sign Up - Patient</a>
    </div>
    <div class="w3-col s3">
      <a href="register_doctor.php" class="w3-button w3-block w3-black">Sign Up - Doctor</a>
    </div>
  </div>
</div>
</body>
