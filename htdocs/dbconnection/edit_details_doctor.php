<?php
    include('../dbconnection/connect.php');
    $editlock = 0;
    session_start();
    $user_name =  $_POST['user_name'];
    $phone_number = $_POST['phone_number'];
    $hospital_name = $_POST['hospital_name'];

    if($editlock == 0){

        $sql = sprintf($string = "UPDATE doctor SET D_name = '%s',phone = '%s', hospital_name = '%s' WHERE doctor_account = '%s'",$user_name,$phone_number,
            $hospital_name,$_SESSION['account']);
			echo $sql;
        mysqli_query($conn, $sql);  
        if (mysqli_query($conn, $sql)){
            header("Location: ../doc_detail.php");
        }
    }
	
    
?>