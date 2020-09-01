<?php
    session_start();
    include('../dbconnection/connect.php');
    $date =  $_POST['booking_date'];
    $hospital = $_POST['booking_hospital'];
    $doctor = $_POST['booking_doctor'];
    $description = $_POST['booking_description'];
    $user_account = $_SESSION['account'];
    $booking_lock = 1;
    $date_now = date("Y-m-d");
    $doctor_account = "";
    $sql = "SELECT doctor_account AS doctor_account
           FROM doctor
           WHERE D_name = '$doctor'";

    $result = $conn->query($sql);

        if ($result->num_rows > 0){
            // for each row, output 
            while($row = $result->fetch_assoc()){
                $doctor_account = $row['doctor_account'];
            }    
        }else{
                echo "The name of doctor is not found, please check the list of doctor";
                $booking_lock = 0;
        }

    $sql = "SELECT hospital_name AS hospital
           FROM doctor
           WHERE D_name = '$doctor' And hospital_name = '$hospital'";

    $result = $conn->query($sql);

     if ($result->num_rows <= 0){
        echo "The name of doctor or the name of hospital is incorrect, please check the list of doctor registered";
        $booking_lock = 0;
     }

    if($date <= $date_now ){
        $booking_lock = 0;
        echo"Time of booking should after today"; 
    }

   function submit_booking(){
        echo "Your booking application is submited, ";
        $to = $_SESSION['account'];
        $subject = "Medical online booking confirm";
        $message = sprintf($string = "Information of your booking: \r\n Patient: %s \r\n Doctor: %s \r\n Hospital: %s \r\n Date: %s \r\n\r\n\r\n System message,do not reply.",$_SESSION['name'],
            $_POST['booking_doctor'],$_POST['booking_hospital'],$_POST['booking_date']);
        $headers = "From: INFS3202 Medical Booking System";
       // $mail_sent = mail($to,$subject,$message,$headers);
        //echo $mail_sent ? "a confirm email is sent to your email address,thank you." : "mail to your address failed";
   }

    $sql = "SELECT *
           FROM booking
           WHERE doctor_account = '$doctor_account' And user_account = '$user_account' And date_of_booking = '$date' ";

   $result = $conn->query($sql);

   if ($result->num_rows > 0){
        echo"You have already submit a booking on this day";
        $booking_lock = 0;
     } 
    

    if($booking_lock == 1){
            $sql = "INSERT INTO booking (user_account,doctor_account, date_of_booking, description,status) VALUES ('{$user_account}','{$doctor_account}','{$date}','{$description}','pending' );";
            if (mysqli_query($conn, $sql)){
                submit_booking();
            }else{
                echo"booking failed because of some unexpected reason, please try again"; 
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
          <a href="../Dr_Contact_Detail.php">Back to booking page now</a>
          <title>Login to the system</title>
    </head>
    <script>
      $(document).ready(function(){
          setTimeout(function() { window.location.replace("../Dr_Contact_Detail.php"); }, 4000);
      }); 

    </script>
</html>