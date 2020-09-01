<?php
    session_start();
    include('dbconnection/connect.php');
 
    //delete the previous picture
    $sql = sprintf($string = "SELECT doctor_picture AS url FROM doctor WHERE doctor_account = '%s'",$_SESSION['account']);
    $result = $conn->query($sql);
        if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            if($row['url'] != null){
               unlink($row['url']);
            }
        }    
    }


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG and PNG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $old_url = sprintf("uploads/%s",$_FILES["fileToUpload"]["name"]);
                $account_name = $_SESSION['account'];
                $new_url =  sprintf("uploads/%s_picture.%s",$account_name,$imageFileType);
                //echo' <img src="'.$old_url.'" height="200" width="200">';
                //rename the img file
                rename($old_url,$new_url);
                $sql = sprintf($string = "UPDATE doctor set doctor_picture = '%s' WHERE doctor_account = '%s'", $new_url, $account_name);
                mysqli_query($conn, $sql);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    header("Location: doc_detail.php");
?>