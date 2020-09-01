<?php
    include('../dbconnection/connect.php');
    $editlock = 0;
    session_start();
    $user_name =  $_POST['user_name'];
    $phone_number = $_POST['phone_number'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $date_now = date("Y-m-d");

    $min_date = date('Y-m-d', strtotime('1900-01-01'));

    // not allow to set the DOB greater than current date or greater than 1900-01-01
    if (($date_of_birth > $date_now) || ($date_of_birth < $min_date)){
       echo 'hello';
       $editlock = 1;
    }

    if($editlock == 0){
        $sql = sprintf($string = "UPDATE user SET U_name = '%s', phone = '%s', DOB = '%s', address = '%s' WHERE user_account = '%s'",$user_name,$phone_number,
        $date_of_birth,$address,$_SESSION['account']);
        mysqli_query($conn, $sql);
    }
    header("Location: ../personal.php");
?>