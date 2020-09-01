<?php
    session_start();
    if(!isset($_SESSION['account']) || !isset($_SESSION['password'])){
        header("Location: login.php");
    }
    if($_SESSION['role'] != "patient"){
        header("Location: login.php");
    }
    include('dbconnection/connect.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
              <!--jquery link-->
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>
    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
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
             include('print_sidebar_patient.php');
        ?>
                   <!-- Right Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <nav>
                    <div class="row">
                        <div class="col-md-10" style="">
                             <a href="#menu-toggle" id="menu-toggle" class="btn btn-default"><img src="img/menu.png" height="25"></a>
                             <img src="img/dashboard.png" height="40">
                        </div>
                        <div class="col-md-2">
                             <?php
                                include('dbconnection/getusername.php');
                                include('dbconnection/get_personal_picture_small.php');
                            ?>
                            <br>
                            <button id="logout-button" type="button" onclick="lock_out()" class="btn btn-info btn-lg">log out</button>    
                        </div>
                    </div>
                </nav>
                <!-- Main content-->
                <div id="mainContent" class="container-fluid">
 
                    <br>

                    <h2 id="upcomingEvents">Upcoming Events</h2>

                    <br>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <caption></caption>
                             <thead>
                                <tr>
                                    <th> Patient_Name  </th>
                                    <th> Doctor_Name</th>
                                    <th> Date</th>
                                    <th> Hospital</th>
                                    <th> Description</th>
                                    <th> Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                 <?php
                                      include('dbconnection/upcomming_event.php')
                                 ?>                     
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
       </div>
    </div>
        <script>
           $("#wrapper").toggleClass("toggled");
           $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            function lock_out(){
                var option = confirm("Are you sure to log out?");
                if (option == true) {
                    window.location.href = "logout.php";
                }
            }
        </script>
</body>

</html>
