<?php
//fetch.php
 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "infs3202";    
    // Check connection
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM doctor 
  WHERE D_name LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM doctor
  ORDER BY D_name
 ";
}
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
                echo "<tr>";
                echo "<td>{$row['D_name']}</td>";
                echo "<td>{$row['doctor_account']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['hospital_name']}</td>";
                echo '<td><img src="'.$row['doctor_picture'].'" height="200" width="200" id="personal_img"></td>';
                echo '<td><button id="'.$row['doctor_account'].'" type="button" class="btn btn-info btn-lg" onclick="booking_doctor(this.id)">Book This Doctor</button></td>';
                echo "</tr>"; 
 }
}
else
{
 echo 'Sorry,Data Not Found';
}

?>
   