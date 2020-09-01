<?php
    session_start();
    include('dbconnection/connect.php');
    if(!isset($_SESSION['account']) || !isset($_SESSION['password'])){
        header("Location: login.php");
    }
    if($_SESSION['role'] != "patient"){
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
    <title>Image Filter</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/filter.css" rel="stylesheet">
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

                    <h2 id="image_filter">Online Image Filtering</h2>
                    <br>
                    <div class="filter">
                          <h3>Filter Examples:</h3>
                            <ul class="filter_examples">
                                <li>
                                    <img src="img/grayscaleExample.jpg" alt="grayscale" height="350px" width="500px" />
                                    <label>grayscale</label>
                                </li>
                                <br>
                                <li>
                                    <img src="img/brightnessExample.png" alt="grayscale" height="350px" width="500px" />
                                    <label>brightness</label>
                                </li>
                                <br>
                                <li>
                                    <img src="img/colorizeExample.png" alt="grayscale" height="350px" width="500px" />
                                    <label>colorize</label>
                                </li>
                                 <br>
                                <li>
                                    <img src="img/pixelateExample.png" alt="grayscale" height="350px" width="500px" />
                                    <label>pixelate</label>
                                </li>
                           </ul>
                           <h3>Select the filter:</h3>
                          <form method="POST" action="process_gd_filter.php">
                            <select class="select_filter" name="filters">
                              <option value="grayscale">grayscale</option>
                              <option value="brightness">brightness</option>
                              <option value="colorize">colorize</option>
                              <option value="pixelate">pixelate</option>
                            </select>
                            <br>
                           <input type="submit" value="Apply Filteringilter" name="Apply_filter" class="btn btn-lg btn-primary btn-block"/>
                        </form>
                        <br>
                        <a href="personal.php" class="btn btn-lg btn-primary btn-block">Back to personal page</a>
                    </div>
                </div>
        </div>
        <!-- /#page-content-wrapper -->
       </div>



    </div>
        <script type="text/javascript">
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
