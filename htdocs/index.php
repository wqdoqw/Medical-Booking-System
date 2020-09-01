<!DOCTYPE html>
<html>
<title>INFS3202 Medical Booking System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
      font-size: 1.6em;
    }

    a{
      font-size: 1.5em;
    }
    #facebook_icon:hover{
      opacity: 0.7;
    }
</style>
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

  <!-- Header with image -->
  <header class="bgimg w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-middle w3-center">
        <h1 class="w3-jumbo w3-animate-top">Medical Booking System</h1>
        <p class="w3-center">Online booking system for doctor and patient</p>
    </div>
    <div class="w3-display-bottomright w3-center w3-padding-large">
    </div>
  </header>
  <!-- End page content -->
  </div>

  <!-- Footer -->
  <footer class="w3-center w3-light-grey w3-padding-48 w3-large">
    <p>Developed by - Dixun Tan, Lu Qi, Sang IK Park </p>
 </footer>


  </body>
</html>
