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
    <title>Medical Booking System - INFS3202</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/view_detail.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
                             <img src="img/dashboard.png" height="40">
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
                    <h2 id="upcomingEvents">Booking Details</h2>
                    <br>
                    <div class="booking_details">
                        <?php
                           $useraccount = $_SESSION['account'];
                           $booking_id = $_GET["bid"];
                           $_SESSION['bid'] = $booking_id;
                           $sql ="SELECT A.U_name AS user_name, A.user_account AS user_account, A.phone AS phone, 
                            C.date_of_booking AS booking_date, A.picture_url AS picture_url,C.description AS description, C.status AS status
                           FROM user A , doctor B, booking C
                           WHERE C.user_account = A.user_account AND B.doctor_account = C.doctor_account AND B.doctor_account = '$useraccount' AND C.booking_id = '$booking_id'";   
                            $result = $conn->query($sql);          
                            if(mysqli_num_rows($result) > 0)
                            {
                                  while($row = $result->fetch_assoc()){
                                    echo '<img src="'.$row['picture_url'].'" height="300" width="300" id="personal_img">';
                                    echo'<br>';    
                                    echo '<label>Patient Name: '.$row['user_name'].'</label>';
                                    echo'<br>';
                                    echo '<label>Patient Email: '.$row['user_account'].'</label>';
                                    echo'<br>';
                                    echo '<label>Contact Number: '.$row['phone'].'</label>';
                                    echo'<br>';
                                    echo '<label>Date of Booking: '.$row['booking_date'].'</label>';
                                    echo'<br>';
                                    echo '<label>Description: '.$row['description'].'</label>';
                                    echo'<br>';
                                    echo '<label>Status: '.$row['status'].'</label>';
                                    echo'<br>';
                                    if($row['status'] == "pending" && $row['booking_date'] > date("Y-m-d")){
                                        echo'<button id="accept_booking" type="button" onclick="accept_booking()" class="btn btn-info btn-lg">Accept this booking</button>
                                             <br><br>
                                             <button id="reject_booking" type="button" onclick="reject_booking()" class="btn btn-info btn-lg">Reject this booking</button>    
                                             <br><br>';
                                    }
                                    echo'<button type="button" onclick="goBack()" class="btn btn-info btn-lg">Back</button>';
                                 }
                            }else{
                                 echo 'Data Not Found';
                                 header("Location: doctordashboard.php");
                            }
                        ?>
                    </div>
                </div>
           </div>
        <!-- /#page-content-wrapper -->
       </div>



    </div>
        <!-- Menu Toggle Script -->
        <script>
           $("#wrapper").toggleClass("toggled");
           $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
           function accept_booking(){
                var option = confirm("Are you sure to accept this booking?");
                if (option == true) {
                    window.location.href = "dbconnection/accept_booking.php";
                }
          }
          function reject_booking(){
                var option = confirm("Are you sure to reject this booking?");
                if (option == true) {
                    window.location.href = "dbconnection/reject_booking.php";
                }
          }
           function lock_out(){
                var option = confirm("Are you sure to log out?");
                if (option == true) {
                    window.location.href = "logout.php";
                }
          }
          function goBack(){
                window.history.back();
          }
        </script>
</body>

</html>
