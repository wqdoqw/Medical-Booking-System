<?php
    $useraccount = $_SESSION['account'];
     if($_SESSION['role'] == "patient"){
           $sql = "SELECT user_account AS email, U_name AS user_name, phone AS phone_number, DOB AS dob, address AS user_address
           FROM user
           WHERE user_account = '$useraccount'";
     }else{
           $sql = "SELECT doctor_account AS email, D_name AS user_name, phone AS phone_number, hospital_name AS hospital_name
           FROM doctor
           WHERE doctor_account = '$useraccount'";
     }

    // problem
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
            if($_SESSION['role'] == "patient"){
              echo '
            <div> 
               <div id="personal_form">
                      <form method="POST" action="../dbconnection/edit_details.php">
                            <div>
                                <label class="user_name" for="user_name" >Name:</label>
                                <input id="userName" name="user_name" type="text" class="l-form-username form-control" maxlength="30" value="' . $row['user_name'] . '" required>
                            </div>

                            <br>

                            <div>
                                <label class="phone_number" for="phone_number">Phone Number(10 digits):</label>
                                <input id="phoneNumber" name="phone_number" type="text" class="l-form-username form-control" pattern="[0-9]{10}" maxlength="10" value="' . $row['phone_number'] . '" required>
                            </div>

                            <br>

                             <div>
                                <label class="date_of_birth" for="date_of_birth" >Date of Birth:</label>
                                <input id="dateOfBirth" name="date_of_birth" type="date" class="l-form-username form-control" value="' . $row['dob'] . '" required>
                            </div>

                            <br>

                             <div>
                                <label class="address" for="address" name="address">Address:</label>
                                <input id="userAddress" name="address" type="text" class="l-form-username form-control" maxlength="150" value="' . $row['user_address'] . '" required>
                            </div>

                           <br>
                           <input type="submit" value="Edit Detail" name="submit" class="btn btn-lg btn-primary btn-block"/>
                       </form>
                    </div>
                    <br>
            </div>';
            }else{
                echo '
            <div> 
               <div id="personal_form">
                      <form method="POST" action="../dbconnection/edit_details_doctor.php">
                            <div>
                                <label class="user_name" for="user_name" >Name:</label>
                                <input id="doctorName" name="user_name" type="text" class="l-form-username form-control" maxlength="30" value="' . $row['user_name'] . '" required>
                            </div>

                            <br>

                            <div>
                                <label class="phone_number" for="phone_number">Phone (10 digits):</label>
                                <input id="doctorPhoneNumber" name="phone_number" type="tel" class="l-form-username form-control" pattern="[0-9]{10}" maxlength="10" 
                                 value="' . $row['phone_number'] . '" required>
                            </div>

                            <br>

                             <div>
                                <label class="hospital_Name" for="hospital_Name" >Hospital Name:</label>
                                <input id="hospital_Name" name="hospital_name" type="text" class="l-form-username form-control" maxlength="100" value="' . $row['hospital_name'] . '" required>
                            </div>

                            <br>
                           <br>
                           <input type="submit" value="Edit Detail" name="submit" class="btn btn-lg btn-primary btn-block"/>
                       </form>
                    </div>
                    <br>
            </div>';
            }    
        }    
    }else{
        // echo "none" ;
    }
?>