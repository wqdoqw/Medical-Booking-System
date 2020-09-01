<?php 
  phpinfo();
?>
<!--
  echo '    
  <section class="homesection">  
    <div id="title">
        <h1>Login to the system</h1>
        <br>
    </div>
    <div id="loginForm">
      <form method="POST" action="process.php">
        <div class="form-contentOne">
           <input type="text" name="username" placeholder="User Name" class="l-form-username form-control" id="l-form-username" value="'. $_COOKIE["account"] .'">
         </div>
         <div class="form-contentTwo">
             &nbsp;
             <input type="password" name="password" placeholder="Password" class="btn btn-lg btn-primary btn-block" value="'. $_COOKIE["password"] .'">
         </div>
         <br>         
         <div class="form-contentFour">
             <label>Your Role:</label>
             <select name="role">
              <option value="patient">Patient</option>
              <option value="doctor">Doctor</option>
            </select>
         </div>

         <div class="form-contentFive">
            <input type="checkbox" name="rememberMe" value="remember-me" checked> Remember me
         </div>
         <div class="form-contentThree">
            <input type="submit" value="Sign in" name="submit" class="btn"/>
             &nbsp;&nbsp;    
         </div>
         <br>
       </form>
    </div>
    <a href="forget_password.php">Forget Password?</a>
     &nbsp;&nbsp;&nbsp;
    <a href="index.php">Back To Home Page</a>   
  </section>  ';
  -->