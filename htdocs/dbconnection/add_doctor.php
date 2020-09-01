<?php
    include('../dbconnection/connect.php');
    $D_name =  $_POST['user_name'];
    $doc_account = $_POST['user_email'];
    $doc_password = $_POST['user_password'];
    $doc_phone = $_POST['user_phone'];
    $hospital = $_POST['hospital_name'];
    $register_lock = 0;

    $sql = sprintf($string = "SELECT user_account From user Where user_account = '%s'",$doc_account);
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        die("This email address has been registered.");
    }else{
        $sql = sprintf($string = "SELECT doctor_account From doctor Where doctor_account = '%s'",$doc_account);
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            die("This email address has been registered.");
        }else{
            $register_lock = 1;
        }
    }

    if($register_lock == 1){
        $sql = "INSERT INTO doctor (doctor_account,D_name, password, phone, hospital_name, doctor_picture) VALUES ('{$doc_account}','{$D_name}',
        '{$doc_password}','{$doc_phone}','{$hospital}','uploads/default_picture.png' );";        
        if (mysqli_query($conn, $sql)){
            echo "you have been registered to the system";
            
        }else{
            die("failed to register to the system, please try again later");
        }

    }
?>