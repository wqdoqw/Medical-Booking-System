<?php  
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "infs3202";    
    // Check connection
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
	 $sql = "DELETE FROM booking WHERE booking_id = '".$_POST["id"]."'"; 
	 if(mysqli_query($conn, $sql))  
	 {  
	      echo 'This booking has been canceled';  
	 }  
 ?>