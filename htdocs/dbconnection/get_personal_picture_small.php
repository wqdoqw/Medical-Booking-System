<?php
     if($_SESSION['role'] == "patient"){
        $sql = sprintf($string = "SELECT picture_url AS url FROM user WHERE user_account = '%s'",$_SESSION['account']);
     }else{
        $sql = sprintf($string = "SELECT doctor_picture AS url FROM doctor WHERE doctor_account = '%s'",$_SESSION['account']);
     }
     //echo $_SESSION['role'];
    // $sql = sprintf($string = "SELECT picture_url AS url FROM user WHERE user_account = '%s'",$_SESSION['account']);
     $result = $conn->query($sql);
        if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
            if($row['url'] != null){
               echo'<img src="'.$row['url'].'" height="50" width="50" id="personal_img_small">';
            }else{
               echo'<img src="img/personal_icon_default.png" height="50" width="50" id="personal_img_small">';
            }
        }    
    }
?>