<!DOCTYPE html>
<html lang="en">

  <head>
  
  
   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sign Up Form</title>
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/register.css">
		<link rel="stylesheet" href="css/zoom.css">
		<link rel="stylesheet" href="background.css">
		
		<link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
		<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
          <script type="text/javascript" src="javascript.js"></script>

		  
    </head>
    <body>
<form action="dbconnection/insert_user.php" method="post" onsubmit="return checkFromValidation()">
      
        <h1>Sign Up - patient</h1>
        
        <fieldset>
          <legend>Your basic info</legend>
          <label for="name">Name:</label>
          <input type="text" id="name" name="user_name" maxlength="30" required>
          
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="user_email" minlength="10" maxlength="50" required>
          
          <label for="password">Password (6 to 20 characters):</label>
          <input type="password" id="password" name="user_password" minlength="6" maxlength="20" required>

          <label for="password">Confirm Password:</label>
          <input type="password" id="confirm_password" name="confirm_password" minlength="6" maxlength="20" required>
          <span id='message'></span>
          
          <label for="phone">Phone (10 digits):</label>
          <input type="tel" id="phone" name="user_phone" pattern="[0-9]{10}" maxlength="10" required>
          
          <label for="DOB">Birthday:</label>
          <input type="date" id="DOB" name="user_DOB" min="1990-01-01" max="2019-01-01" required>  
              
           <label for="address">Address:</label>
          <input type="text" id="address" name="user_address" required>       
                          
        </fieldset>
        
		<button name="submit" type="submit" class="button">Sign up</button>
		 <a href="index.php" class="button">Go Back</a>
</form>

 <script type="text/javascript">
        $('#password, #confirm_password').on('keyup', function () {
          if ($('#password').val() != $('#confirm_password').val()) {
            $('#message').html('Password not matching').css('color', 'red');
          }else{
            $('#message').html('');
          } 
        });

        function checkFromValidation(){
          if ($('#password').val() != $('#confirm_password').val()){
            return false;
          }else{
            return true;
          }
       }
      </script>
	  
	</body>
	
	

</html>
