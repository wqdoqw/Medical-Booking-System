<?php
      if($_SESSION['role'] == "patient"){
        $sql = sprintf($string = "SELECT picture_url AS url FROM user WHERE user_account = '%s'",$_SESSION['account']);
     }else{
        $sql = sprintf($string = "SELECT doctor_picture AS url FROM doctor WHERE doctor_account = '%s'",$_SESSION['account']);
     }
     $result = $conn->query($sql);
        if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
            if($row['url'] != null){
               echo'<img src="'.$row['url'].'" alt="personal_img" height="500" width="500">';
            }else{
               echo'<img src="img/personal_icon_default.png" height="300" width="300" id="personal_img">';
            }
        }    
    }
?>