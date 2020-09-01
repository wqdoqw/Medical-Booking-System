<?php
    session_start();
    if(!isset($_SESSION['account']) || !isset($_SESSION['password'])){
        header("Location: login.php");
    }
    //role check 
    if($_SESSION['role'] != "doctor"){
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
    <title>Patient detail</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
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
                             <img src="img/booking_history.png" height="50">
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
                    <h2 id="upcomingEvents">All Booking Details</h2>
                    <button id="view_pdf" type="button" class="btn btn-info btn-lg">View as PDF</button>
                   <h4>Search by date(YY-MM-DD)</h4>
                   <input type="text" name="search_text" id="search_text" placeholder="Search by booking date" class="form-control" />

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <caption></caption>
                             <thead>
                                <tr>
                                    <th>Patient_Name</th>
                                    <th>Patient_email</th>
                                    <th>Patient_phone</th>
                                    <th>Booking Date</th>
                                    <th>Picture</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>View Details</th>
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
            $("#view_pdf").click(function(e) {
                window.location.href="view_pdf.php"
            });
           $("#wrapper").toggleClass("toggled");
           $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            function view_booking_detail(clicked_id)
           {
                var booking_id = clicked_id;
                var location = "view_booking_detail.php?bid=" + booking_id;
                window.location.href = location;
           }
          function lock_out(){
                var option = confirm("Are you sure to log out?");
                if (option == true) {
                    window.location.href = "logout.php";
                }
          }
        </script>

        <script>
        $(document).ready(function(){

         load_data();

         function load_data(query)
         {
          $.ajax({
           url:"dbconnection/fetch_booking.php",
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
