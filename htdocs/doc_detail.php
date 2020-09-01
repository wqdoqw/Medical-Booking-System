<?php
    include('dbconnection/connect.php');
    session_start();
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

                    <h2 id="personalDetails">Personal Details</h2>

                    <br>

                    <div class="upload_personal_image">
                         <?php
                            include('dbconnection/get_personal_picture.php')
                         ?>
                    </div>

                    <div class="personal_detail_list">

                        <form action="upload_doctor.php" method="post" enctype="multipart/form-data">
                            Select image to upload:
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                            <input type="submit" value="Upload Image" name="submit" class="btn btn-success btn-block my-3" >
                        </form>
                        <button type="button" onclick="link_image_filter()" class="btn btn-info btn-lg">Uploaded Image Filter</button>
                        <br>
                         <?php
                                include('dbconnection/get_personal_detail.php')
                         ?>
                    </div>
                    <button id="change_password" type="button" class="btn btn-lg btn-primary btn-block">Change Password</button>    
                </div>
        </div>
        <!-- /#page-content-wrapper -->
       </div>
    </div>
        <script>
          $("#change_password").click(function(e){
               window.location.href="reset_password_doctor.php"
            });
          function lock_out(){
                var option = confirm("Are you sure to log out?");
                if (option == true) {
                    window.location.href = "logout.php";
                }
          }

           $("#wrapper").toggleClass("toggled");
           $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
           function link_image_filter(){
                window.location.href = "image_filter_doctor.php";
            }

        </script>
</body>

</html>
