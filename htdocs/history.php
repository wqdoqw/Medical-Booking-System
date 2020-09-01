<?php
   session_start();
   include('dbconnection/connect.php');
   if($_SESSION['role'] != "patient"){
    header("Location: login.php");
   }
   if(!isset($_SESSION['account']) || !isset($_SESSION['password'])){
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
    <title>Booking History</title>

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
                    </div>
                </nav>
                <!-- Main content-->
                <div id="mainContent" class="container-fluid">
 
                    <br>

                    <h2 id="booking-history">Booking History</h2>

                    <br>

                   <div id="live_data"></div>
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
           $("#wrapper").toggleClass("toggled");
           $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        <script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"dbconnection/history_event.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();    
    
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id6");  
        if(confirm("Are you sure you want to cancel this booking?"))  
        {  
            $.ajax({  
                url:"dbconnection/delete.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>
        

</body>

</html>
