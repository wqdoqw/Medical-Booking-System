<?php
    $useraccount = $_SESSION['account'];
    $date_now = date("Y-m-d");
    $sql = "SELECT A.U_name AS user_name,B.D_name AS doctor_name, C.date_of_booking AS booking_date, B.hospital_name AS hospital_name, C.description AS description, C.status AS status
           FROM user A , doctor B, booking C
           WHERE C.user_account = A.user_account AND A.user_account = '$useraccount' AND B.doctor_account = C.doctor_account
           ORDER BY C.date_of_booking;";
    // problem
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
            if ($row['booking_date'] > $date_now){
                echo "<tr>";
                echo "<td>{$row['user_name']}</td>";
                echo "<td>{$row['doctor_name']}</td>";
                echo "<td>{$row['booking_date']}</td>";
                echo "<td>{$row['hospital_name']}</td>";
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "</tr>";
            }
        }    
    }else{
        // echo "none" ;
    }
?>