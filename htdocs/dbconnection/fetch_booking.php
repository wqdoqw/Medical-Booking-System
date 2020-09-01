<?php
//fetch.php
 session_start();
 $useraccount = $_SESSION['account'];
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
 /*
 $query = "
  SELECT * FROM user 
  WHERE U_name LIKE '%".$search."%'
 ";
 */
 $query = "SELECT A.U_name AS user_name, A.user_account AS user_account, A.phone AS phone, 
           C.date_of_booking AS booking_date, A.picture_url AS picture_url, C.status AS status, C.description AS description, C.booking_id AS booking_id
           FROM user A , doctor B, booking C
           WHERE C.user_account = A.user_account AND B.doctor_account = C.doctor_account AND B.doctor_account = '$useraccount' AND C.date_of_booking LIKE '%".$search."%';";



}
else
{
 $query ="SELECT A.U_name AS user_name, A.user_account AS user_account, A.phone AS phone, 
            C.date_of_booking AS booking_date, A.picture_url AS picture_url, C.status AS status, C.description AS description, C.booking_id AS booking_id
           FROM user A , doctor B, booking C
           WHERE C.user_account = A.user_account AND B.doctor_account = C.doctor_account AND B.doctor_account = '$useraccount'
           ORDER BY C.date_of_booking";
}
$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
                echo "<tr>";
                echo "<td>{$row['user_name']}</td>";
                echo "<td>{$row['user_account']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['booking_date']}</td>";
                echo '<td><img src="'.$row['picture_url'].'" height="200" width="200" id="personal_img"></td>';
                echo "<td>{$row['description']}</td>";
                echo "<td>{$row['status']}</td>";
                echo '<td><button id="'.$row['booking_id'].'" type="button" class="btn btn-info btn-lg" onclick="view_booking_detail(this.id)">View</button></td>';
                echo "</tr>"; 
 }
 
}
else
{
 echo 'Sorry,Data Not Found';
}

?>
   