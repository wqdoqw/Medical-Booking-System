<!DOCTYPE html>

<html lang="en">

  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/forget_password.css">
    </head>
    <body>

      <form action="dbconnection/random_password.php" method="post"> 
        <h2>Forget The Password?</h2>       
        <fieldset>
            <legend><span class="number">1</span>Your Email Address:</legend>
            <input type="email" id="name" name="user_email" required>
            <button type="submit">Next</button>
        </fieldset>
        <a href="login.php" class="button">Go Back</a>
      </form>  
    </body>
</html>

</html>