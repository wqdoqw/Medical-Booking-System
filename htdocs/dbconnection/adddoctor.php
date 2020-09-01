<?php
    include('../dbconnection/connect.php');
    $D_name =  $_POST['doc_name'];
    $doc_account = $_POST['doc_email'];
    $doc_password = $_POST['doc_password'];
    $doc_phone = $_POST['doc_phone'];
    $hospital = $_POST['hospital_name'];

    $sql = "INSERT INTO doctor (doctor_account,D_name, password, phone, hospital_name) VALUES ('{$doc_account}','{$D_name}','{$doc_password}','{$doc_phone}','{$hospital}' );";

    if (mysqli_query($conn, $sql)){
        //echo "form submitted, now redirect u back to the eath";
        
    }else{
        //echo "failed";
    }


?>
<meta http-equiv="refresh" content="0;URL=../login.php" />