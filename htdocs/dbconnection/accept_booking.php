<?php
    include('../dbconnection/connect.php');
    session_start();
    $bid = $_SESSION['bid'];
	
    $sql = sprintf($string = "UPDATE booking SET status = 'approved' WHERE booking_id = '%s'",$bid);
    mysqli_query($conn, $sql);
	
?>
<head>
    <meta charset="utf-8">
              <!--jquery link-->
    <script type="text/javascript" src="../jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../javascript.js"></script>
    <title>Medical Booking System - INFS3202</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
    <script type="text/javascript">
        $( document ).ready(function() {
            window.history.back();
        });
    </script>
</body>