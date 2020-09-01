<?php
     if($_SESSION['role'] == "patient"){
        $sql = sprintf($string = "SELECT U_name AS user_name FROM user WHERE user_account = '%s'",$_SESSION['account']);
     }else{
        $sql = sprintf($string = "SELECT D_name AS user_name FROM doctor WHERE doctor_account = '%s'",$_SESSION['account']);
     }
     $result = $conn->query($sql);
     if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
            if($row['user_name'] != null){
            	echo '<div> 
                       <p id="showusername"> Welcome, ' . $row['user_name']. '</p>
                     </div>';
            }
        }    
    }

?>
