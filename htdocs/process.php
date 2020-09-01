<?php
session_start();
include('dbconnection/connect.php');	
$username = $_REQUEST['username'];
$password_input = $_REQUEST['password'];
$captcha_input = $_REQUEST['captcha'];
$role = $_REQUEST['role'];
$captcha_code = $_SESSION['captcha']['code'];
if($role == "patient"){
  $sql = $conn->prepare("SELECT user_account AS account, 
               password AS password,
               U_name AS name
            FROM user
            WHERE user_account = (?) ");
}else{
  $sql = $conn->prepare("SELECT doctor_account AS account, 
               password AS password,
               D_name AS name
            FROM doctor
            WHERE doctor_account = (?) ");
}

  $sql->bind_param("s",$username);
  $sql->execute();
  $result = $sql->get_result();
 if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){	
              //captcha validation first
              if($captcha_input == $captcha_code){

                  if(password_verify($password_input, $row['password'])){
                      $_SESSION['account'] = $row['account'];
                      $_SESSION['password'] = $row['password'];
                      $_SESSION['name'] = $row['name'];
                      $_SESSION['role'] = $role;
                   // check if check the box of remember me
                   if(isset($_REQUEST['rememberMe'])){                    
                      setcookie("account",$row['account'],time()+3600);
                      setcookie("password",$password_input,time()+3600);
                    }else{
                      //reset cookie 
                      unset($_COOKIE["account"]);
                      setcookie("account", null, -1, '/');
                      unset($_COOKIE["password"]);
                      setcookie("password", null, -1, '/');
                    }
                    // header user to different main pages depends on their role
                    if($role == "patient"){
                      header("location: dashboard.php");
                    }else{
                      header("location: doctordashboard.php");
                    }
       
                  }else{
                   echo'<h1>Incorrect email address or password,back to login page automatically after 3 seconds</h1>';
                  }        
              }else{
                 echo "Verification code entered is incorrectly entered or expired,back to login page automatically after 3 seconds";
              }
        }    
    }else{
        echo"<h1>User account is not exist, please check your account,back to login page automatically after 3 seconds</h1>";
    }
?>

<html>
  <head>
            <meta charset="utf-8" />
            <!-- font family -->
            <link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
            <!-- style sheet -->
          
            <!--jquery link-->
            <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="javascript.js"></script>
            <a href="login.php">Back to login now</a>
            <title>Login to the system</title>
  </head>
    <script>
    $(document).ready(function(){
        setTimeout(function() { window.location.replace("login.php"); }, 3000);
    }); 
  </script>

</html>