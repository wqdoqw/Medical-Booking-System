<?php
    include('connect.php');
    $sql = "SELECT D_name , doctor_account , hospital_name, phone
           FROM doctor ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
        // for each row, output       
                echo "<tr>";
                echo "<td>{$row['D_name']}</td>";
                echo "<td>{$row['doctor_account']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['hospital_name']}</td>";
                echo "</tr>"; 
    }}
    else{
        // echo "none" ;
    }
?>