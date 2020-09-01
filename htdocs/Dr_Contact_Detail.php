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
    <title>Dr contact detail</title>

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
                             <img src="img/online_booking.png" height="50">
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
                    <h2 id="upcomingEvents">Doctor Details</h2>
                    <button id="view_pdf" type="button" class="btn btn-info btn-lg">View as PDF</button>
                   <h4>Search Doctor</h4>
                   <input type="text" name="search_text" id="search_text" placeholder="Search by Doctor Name" class="form-control"/>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <caption></caption>
                             <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Doctor Email</th>
                                    <th>Phone Number</th>
                                    <th>Hospital</th>
                                    <th>Picture</th>
                                    <th>Online Booking</th>
                                </tr>
                            </thead>
                            <tbody id="result">

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
           $("#view_pdf").click(function(e) {
                window.location.href="view_pdf_patient.php"
            });
            function lock_out(){
                var option = confirm("Are you sure to log out?");
                if (option == true) {
                    window.location.href = "logout.php";
                }
            }
           function booking_doctor(clicked_id){     
            var doctor_account = clicked_id;
            var location = "booking.php?doctor_email=" + doctor_account;
            window.location.href = location;
           }
        </script>
        <script>
            $(document).ready(function(){

             load_data();

             function load_data(query)
             {
              $.ajax({
               url:"dbconnection/fetch_doctor.php",
               method:"POST",
               data:{query:query},
               success:function(data)
               {
                $('#result').html(data);
               }
              });
             }
             $('#search_text').keyup(function(){
              var search = $(this).val();
              if(search != '')
              {
               load_data(search);
              }
              else
              {
               load_data();
              }
             });
            });
        </script>
</body>

</html>
