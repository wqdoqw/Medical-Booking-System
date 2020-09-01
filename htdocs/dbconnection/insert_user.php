<?php
include('../dbconnection/connect.php');

if (isset($_POST['submit'])) {
	$name = $_POST['user_name'];
	$password = $_POST['user_password'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$email = filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL);
	$phone = $_POST['user_phone'];
	$dob = $_POST['user_DOB'];
	$address = $_POST['user_address'];
	$picture = 'img/default_picture.png';
	$register_lock = 0;
	$sql = $conn->prepare("SELECT user_account From user Where user_account = (?) ");
	$sql->bind_param("s",$email);
	$sql->execute();
	$result = $sql->get_result();

    if ($result->num_rows > 0){
         echo "This email address has been registered.";
    }else{
        $sql = $conn->prepare("SELECT doctor_account From doctor Where doctor_account = (?) ");
		$sql->bind_param("s",$email);
		$sql->execute();
		$result = $sql->get_result();
        if ($result->num_rows > 0){
            echo "This email address has been registered.";
        }else{
            $register_lock = 1;
        }
    }
	if($register_lock == 1){
		$stmt = $conn->prepare("INSERT INTO user
		(user_account, U_name, password, phone, DOB, address, picture_url)
		VALUES (?,?,?,?,?,?,?)"); 
		$stmt->bind_param("sssisss", $email, $name, $hashed_password, $phone, $dob, $address, 
		$picture);
		
		if($stmt->execute()){
        echo "You have successfully signed up";
		}
		else 
		{
        echo "Error: ". $conn->error;
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
          <title>Sign up</title>
	</head>
	<script>
	  $(document).ready(function(){
	      setTimeout(function() { window.location.replace("../login.php"); }, 3000);
	  }); 
	</script>
</html>
   
   