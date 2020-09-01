<?php
    session_start();
    include('../dbconnection/connect.php');
    $old_password =  $_POST['old_Password'];  
    $new_Password = $_POST['new_Password'];
    $confirm_Password = $_POST['confirm_Password'];
    if($_SESSION['role'] == "patient"){
        $sql = sprintf($string = "SELECT password AS user_old_password FROM user WHERE user_account = '%s'",$_SESSION['account']);
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               //check if the old password input is correct
               if(password_verify($old_password, $row['user_old_password'])){
                 if($new_Password == $confirm_Password){
                     $hashed_password = password_hash($new_Password, PASSWORD_DEFAULT); 
                     $sql = sprintf($string = "UPDATE user SET password = '%s' WHERE user_account = '%s'",$hashed_password,$_SESSION['account']);
                     if ($conn->query($sql) === TRUE) {
                        $_SESSION['password'] = $new_Password;
                        echo "Your password has been reset, you can login to the system using the new password.";
                     } else {
                        echo "Reset Error: " . $conn->error;
                     }
                 }
               }else{
                echo "Your old password is incorrect.";
               }
            }    
        }
    }else{
        $sql = sprintf($string = "SELECT password AS user_old_password FROM doctor WHERE doctor_account = '%s'",$_SESSION['account']);
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
               //check if the old password input is correct
               if(password_verify($old_password, $row['user_old_password'])){
                 if($new_Password == $confirm_Password){
                     $hashed_password = password_hash($new_Password, PASSWORD_DEFAULT);
                     $sql = sprintf($string = "UPDATE doctor SET password = '%s' WHERE doctor_account = '%s'",$hashed_password,$_SESSION['account']);
                     if ($conn->query($sql) === TRUE) {
                        $_SESSION['password'] = $new_Password;
                        echo "Your password has been reset, you can login to the system using the new password.";
                     } else {
                        echo "Reset Error: " . $conn->error;
                     }
                 }
               }
            }    
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
          <meta charset="utf-8" />
          <!-- font family -->
          <link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
          <!-- style sheet -->
        
          <!--jquery link-->
          <script type="text/javascript" src="../jquery-3.2.1.min.js"></script>
          <script type="text/javascript" src="../javascript.js"></script>
          <title>Reset Password</title>
    </head>
    <script>
      $(document).ready(function(){
          setTimeout(function() { history.back(); }, 4000);
      }); 

    </script>
</html>