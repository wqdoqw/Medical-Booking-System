<?php
    session_start();
    include('dbconnection/connect.php');
    if(!isset($_SESSION['account']) || !isset($_SESSION['password'])){
        header("Location: login.php");
    }
    if($_SESSION['role'] != "patient"){
    header("Location: login.php");
    }
    $doctor_account = $_GET["doctor_email"];
    $hospital = $doctor_name = '';
    $sql = sprintf($string = "SELECT D_name AS doctor_name, hospital_name AS hospital From doctor Where doctor_account = '%s'",$doctor_account);
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
            $doctor_name = $row['doctor_name'];
            $hospital = $row['hospital'];
        }    
    }else{
        header("Location: Dr_Contact_Detail.php");
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
              <!--jquery link-->
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Medical Booking System - INFS3202</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="css/booking.css" rel="stylesheet">
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
                             <img src="img/online_booking.png" height="50px">
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
                    <br>
                    <h3>Online Booking Form</h3>
                    <br>
                    <div id="bookingForm">
                      <form method="POST" action="dbconnection/process_booking.php">
                            <br>
                            <div>
                                <label class="booking_labels" for="date">Choose The Date For Booking (Earliest date is tomorrow):</label>
                                <input id="booking_date" type="date" name="booking_date" class="l-form-username form-control" max="2021-12-31" required>
                            </div>
                            <br>
                            <div>
                                <?php 
                                    echo'
                                        <label class="booking_labels" for="date">Name Of Hospital For Booking:</label>
                                        <input id="hospital" type="text" name="booking_hospital" class="l-form-username form-control" value="'.$hospital.'" readonly>
                                       ';
                                ?>
                            </div>

                            <div>
                                    <a id="map_browse" class="map_browse" href="search_hospital.php" target="_blank">Discover Hospital Location</a>
                            </div>
                            <br>
                            <div>
                                <?php
                                    echo'                                
                                        <label class="booking_labels" for="doctorname">Name Of Doctor:</label>
                                        <input id="doctorname" type="text" name="booking_doctor" class="l-form-username form-control" value="'.$doctor_name.'" readonly>';
                                ?>
                            </div>
                            <br>
                            <label class="booking_labels" for="date">Description:</label>
                            <br>
                            <textarea rows="4" cols="50" name="booking_description" class="l-form-username form-control" maxlength=250 required></textarea>              
                           <input type="submit" value="Booking Now" name="submit" class="btn btn-lg btn-primary btn-block"/>
                       </form>
                       <br>
                           <button onclick="back_to_booking()" class="btn btn-lg btn-primary btn-block">Back to list of doctors </button>
                    </div>
                </div>
            </div>
        <!-- /#page-content-wrapper -->
       </div>
    </div>
       <script>
        function back_to_booking(){
           window.location.href = "Dr_Contact_Detail.php";
        }
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
        </script>

    <script type="text/javascript">
      var tomorrow = new Date();
      var dd = tomorrow.getDate()+1;
      var mm = tomorrow.getMonth()+1; //January is 0!
      var yyyy = tomorrow.getFullYear();
       if(dd<10){
              dd='0'+dd
          } 
          if(mm<10){
              mm='0'+mm
          } 
      tomorrow = yyyy+'-'+mm+'-'+dd;
      document.getElementById("booking_date").setAttribute("min", tomorrow);
    </script>

</body>

</html>
