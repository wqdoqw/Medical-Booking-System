<?php
include('../dbconnection/connect.php');

if (isset($_POST['submit'])) {
	$name = $_POST['user_name'];
	$password = $_POST['user_password'];		
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$email = filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL);
	$phone = $_POST['user_phone'];
	$hospital = $_POST['hospital_name'];
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
		
		$stmt = $conn->prepare("INSERT INTO doctor 
		(doctor_account, password, D_name, phone, hospital_name, doctor_picture) 
		VALUES  (?,?,?,?,?,?)"); 
		$stmt->bind_param("sssiss", $email, $hashed_password, $name, $phone, $hospital, $picture);
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