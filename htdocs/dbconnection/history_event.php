<?php
    session_start();
    $useraccount = $_SESSION['account'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "infs3202";   
    // Check connection
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $output = ''; 
     $output .= '  
     <div class="table-responsive">  
           <table class="table table-striped">  
                <tr>  
                   <th> Patient Name </th>
                                    <th> Doctor Name</th>
                                    <th> Date</th>
                                    <th> Hospital</th>
                                    <th> Description</th>
                                    <th> Status </th>
                                    <th> Cancel Booking </th> 
                </tr>
   
                            '; 
                        

    $sql = "SELECT C.booking_id AS id, A.U_name AS user_name,B.D_name AS doctor_name, C.date_of_booking AS booking_date, B.hospital_name AS hospital_name, C.description AS description, C.status AS status
           FROM user A , doctor B, booking C
           WHERE C.user_account = A.user_account AND A.user_account = '$useraccount' AND B.doctor_account = C.doctor_account ORDER BY booking_date;";
    // problem
    $result = $conn->query($sql);
     $rows = mysqli_num_rows($result);

    if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
            if($row['booking_date'] > date("Y-m-d") && $row['status'] == "pending"){
                $output .= '  
                    <tr>  
                         <td class="first_name" data-id1="'.$row["id"].'">'.$row['user_name'].'</td>   
                         <td class="last_name" data-id2="'.$row["id"].'">'.$row['doctor_name'].'</td> 
                         <td class="last_name" data-id3="'.$row["id"].'">'.$row['booking_date'].'</td> 
                         <td class="last_name" data-id4="'.$row["id"].'">'.$row['hospital_name'].'</td> 
                         <td class="last_name" data-id5="'.$row["id"].'">'.$row['description'].'</td>  
                         <td class="last_name" data-id5="'.$row["id"].'">'.$row['status'].'</td>
                         <td><button type="button" name="delete_btn" data-id6="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                    </tr>  
                    '; 
            }else{
                 $output .= '  
                    <tr>  
                         <td class="first_name" data-id1="'.$row["id"].'">'.$row['user_name'].'</td>  
                         <td class="last_name" data-id2="'.$row["id"].'">'.$row['doctor_name'].'</td> 
                         <td class="last_name" data-id3="'.$row["id"].'">'.$row['booking_date'].'</td> 
                         <td class="last_name" data-id4="'.$row["id"].'">'.$row['hospital_name'].'</td>
                         <td class="last_name" data-id5="'.$row["id"].'">'.$row['description'].'</td>
                         <td class="last_name" data-id5="'.$row["id"].'">'.$row['status'].'</td>                      
                         <td>Not allow to cancel</td>   
                    </tr>  
                ';  
            }
        }    
    }else{
       echo "No any booking history." ;
    }
                $output .= '</table>  
      </div>';  
 echo $output;
?>
