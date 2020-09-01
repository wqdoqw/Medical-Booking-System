<?php
    session_start();
    include('dbconnection/connect.php');
    if(!isset($_SESSION['account']) || !isset($_SESSION['password'])){
        header("Location: login.php");
    }
    if($_SESSION['role'] != "doctor"){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
              <!--jquery link-->
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>
    <title>Personal Details</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/personal.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

    <div id="hr-top">
        <div id="top-left">
            <img src="img/uqlogo.jpg" height="100">
        </div>

        <div id="top-right">
            <h2> INFS3202 - Medical Booking System</h2>
        </div>

    </div>  

    <div class="clearfix"></div> 

    <div id="wrapper">
            <?php 
             include('print_sidebar_doctor.php');
        ?>
                   <!-- Right Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <nav>
                    <div class="row">
                        <div class="col-md-10" style="">
                             <a href="#menu-toggle" id="menu-toggle" class="btn btn-default"><img src="img/menu.png" height="25"></a>
                             <img src="img/personal_detail.png" height="50">
                        </div>
                        <div class="col-md-2">
                             <?php
                                include('dbconnection/getusername.php')
                            ?>
                              <?php
                                include('dbconnection/get_personal_picture_small.php')
                            ?>
                            <span id="welcomeName" class="bolding"></span>
                            <br>
                            <button id="logout-button" type="button" onclick="lock_out()" class="btn btn-info btn-lg">log out</button>    
                        </div>
                    </div>
                </nav>
                <!-- Main content-->
                <div id="mainContent" class="container-fluid">
 
                    <br>

                    <h2 id="upcomingEvents">Reset Password</h2>
                    <br>
                    <div class="reset_password">
                        <form method="POST" action="dbconnection/reset_process.php" onsubmit="return checkFromValidation()">
                            <label class="old_password" for="old_password" >Old Password:</label>&nbsp;
                            <input id="oldPassword" name="old_Password" type="password" class="l-form-username form-control" placeholder="your old password" required>
                            <br>
                            <label class="new_password" for="new_password" >New Password (6 to 20 characters):</label>&nbsp;
                            <input id="newPassword" name="new_Password" type="password" class="l-form-username form-control" placeholder="your new password" minlength="6" maxlength="20" required>
                            <br>
                            <label class="conform_password" for="new_password" >Confirm Password:</label>&nbsp;
                            <input id="confirmPassword" name="confirm_Password" type="password" class="l-form-username form-control" placeholder="confirm your new password" minlength="6" maxlength="20" required>
                            <span id='message'></span>
                            <br>
                            <input type="submit" value="Reset Password" name="submit" class="btn btn-lg btn-primary btn-block"/>
                        </form>
                    </div>
                </div>
        </div>
        <!-- /#page-content-wrapper -->
       </div>



    </div>
        <script>
            function lock_out(){
                var option = confirm("Are you sure to log out?");
                if (option == true) {
                    window.location.href = "logout.php";
                }
          }
                $('#newPassword, #confirmPassword').on('keyup', function () {
              if ($('#newPassword').val() != $('#confirmPassword').val()) {
                $('#message').html('Password not matching').css('color', 'red');
              }else{
                $('#message').html('');
              } 
            });
           function checkFromValidation(){
              if ($('#newPassword').val() != $('#confirmPassword').val()){
                return false;
              }else{
                return true;
              }
           }
           $("#continue-logout").click(function(e) {
                window.location.href="logout.php"
            });
           $("#wrapper").toggleClass("toggled");
           $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
</body>

</html>
