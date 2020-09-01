<?php
    include('../dbconnection/connect.php');
    $U_name =  $_POST['user_name'];
    $user_account = $_POST['user_email'];
    $password = $_POST['user_password'];
    $phone = $_POST['user_phone'];
    $DOB = $_POST['user_DOB'];
    $address = $_POST['user_address'];
    $register_lock = 0;
    $sql = sprintf($string = "SELECT user_account From user Where user_account = '%s'",$user_account);
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        die("This email address has been registered.");
    }else{
        $sql = sprintf($string = "SELECT doctor_account From doctor Where doctor_account = '%s'",$user_account);
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            die("This email address has been registered.");
        }else{
            $register_lock = 1;
        }
    } 
    if($register_lock == 1){
         $sql = "INSERT INTO user (user_account,U_name, password, phone, DOB, address,picture_url) VALUES ('{$user_account}','{$U_name}',
         '{$password}','{$phone}','{$DOB}','{$address}','uploads/default_picture.png' );";         
        if (mysqli_query($conn, $sql)){
            echo "you have been registered to the system";
            
        }else{
            die("failed to register to the system, please try again later");
        }

    }
?>
