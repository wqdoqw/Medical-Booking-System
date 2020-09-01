<?php
    session_start();
    include('../dbconnection/connect.php');
    $user_email = $_POST['user_email'];
    $random_password = '';
    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function sent_password($user_email,$random_password){
        $to = $user_email;
        $subject = "Password Reset";
        $message = sprintf($string = "Hello,here is your random password: \r\n Password: %s  \r\n\r\n\r\n System message,do not reply.",$random_password);
        $headers = "From: INFS3202 Medical Booking System";
        $mail_sent = mail($to,$subject,$message,$headers);
        echo $mail_sent ? "A new random password has been sent to your email address" : "mail to your address failed";
    }

   // for patient
    $sql = "SELECT user_account AS user_account,password AS password
           FROM user
           WHERE user_account = '$user_email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        // if user is patient
        while($row = $result->fetch_assoc()){
                $random_password = generateRandomString();
                $hashed_password = password_hash($random_password, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password = '$hashed_password' WHERE user_account = '$user_email'";
                if ($conn->query($sql) === TRUE) {
                    sent_password($user_email,$random_password);
                    echo'<br>';
                    echo'<a href="../login.php">Go Back<a>';
                    exit();
                } else {
                    echo "Reset Error: " . $conn->error;
                    echo'<br>';
                    echo'<a href="../forget_password.php">Go Back<a>';
                    exit();
                }


        } 
    }

    // for doctor
    $sql = "SELECT doctor_account AS doctor_account , password AS password
           FROM doctor
           WHERE doctor_account = '$user_email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        // if user is patient
        while($row = $result->fetch_assoc()){
                $random_password = generateRandomString();
                $hashed_password = password_hash($random_password, PASSWORD_DEFAULT);
                $sql = "UPDATE doctor SET password = '$hashed_password' WHERE doctor_account = '$user_email'";
                if ($conn->query($sql) === TRUE) {
                    sent_password($user_email,$random_password);
                    echo'<a href="../login.php">Go Back<a>';
                    echo'<br>';
                    exit();
                } else {
                    echo "Reset Error: " . $conn->error;
                    echo'<a href="../forget_password.php">Go Back<a>';
                    echo'<br>';
                    exit();
                }
        } 
    }else{
        die("this email has not been registered to the system");
        echo'<br>';
        echo'<a href="../forget_password.php">Go Back<a>';
    }
?>