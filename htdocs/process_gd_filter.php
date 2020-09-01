<?php
   session_start();
   include('dbconnection/connect.php');
   $image = $fileType ='';
   $option = $_POST['filters'];
   if($_SESSION['role'] == "patient"){
      $sql = sprintf($string = "SELECT picture_url AS url FROM user WHERE user_account = '%s'",$_SESSION['account']);
   }else{
      $sql = sprintf($string = "SELECT doctor_picture AS url FROM doctor WHERE doctor_account = '%s'",$_SESSION['account']);
   }
   $result = $conn->query($sql);
   if ($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
          $image = $row['url'];
      }    
   }
   //grayscale filter
   if($option == "grayscale"){
      $fileType = substr($image,-4);
      if($fileType == ".png"){
            $im = imagecreatefrompng($image);      
           if($im && imagefilter($im, IMG_FILTER_GRAYSCALE)){
                echo 'Image converted to grayscale.';
                imagepng($im, $image);
                imagedestroy($im);
            }
            else{
                echo 'Conversion to grayscale failed.';
            }
       }else{
            $im = imagecreatefromjpeg($image);
            if($im && imagefilter($im, IMG_FILTER_GRAYSCALE)){
              echo 'Image converted to grayscale.';
              imagejpeg($im, $image);
              imagedestroy($im);
            }else{
                echo 'Conversion to grayscale failed.';

            }
       }

   }
    //brightness filter
   if($option == "brightness"){
        $fileType = substr($image,-4);
        if($fileType == ".png"){
            $im = imagecreatefrompng($image);
            if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, 20)){
            echo 'Image brightness changed.';
            imagepng($im, $image);
            imagedestroy($im);
            }else{
                echo 'Image brightness change failed.';
            }
        }else{
            $im = imagecreatefromjpeg($image);
            if($im && imagefilter($im, IMG_FILTER_BRIGHTNESS, 20)){
                echo 'Image brightness changed.';
                imagejpeg($im, $image);
                imagedestroy($im);
            }
            else{
                echo 'Image brightness change failed.';
            }
        }
   }

   //colorize filter
    if($option == "colorize"){
        $fileType = substr($image,-4);
        if($fileType == ".png"){
            $im = imagecreatefrompng($image);
            /* R, G, B, so 0, 255, 0 is green */
            if($im && imagefilter($im, IMG_FILTER_COLORIZE, 0, 255, 0))
            {
                echo 'Image successfully shaded green.';
                imagepng($im, $image);
                imagedestroy($im);
            }else{
                echo 'colorize image failed.';
            }
        }else{
            $im = imagecreatefromjpeg($image);
            /* R, G, B, so 0, 255, 0 is green */
            if($im && imagefilter($im, IMG_FILTER_COLORIZE, 0, 255, 0))
            {
                echo 'Image successfully shaded green.';
                imagejpeg($im, $image);
                imagedestroy($im);
            }else{
                echo 'colorize image failed.';
            }
        }
   }

    //pixelate filter
    if($option == "pixelate"){
        $fileType = substr($image,-4);
        if($fileType == ".png"){
            $im = imagecreatefrompng($image);
            if($im && imagefilter($im, IMG_FILTER_PIXELATE, 5, true)){
                imagepng($im, $image);
                imagedestroy($im);
            }else{
                echo 'image pixelate failed';
            }          
        }else{
            $im = imagecreatefromjpeg($image);
            if($im && imagefilter($im, IMG_FILTER_PIXELATE, 5, true)){
                imagejpeg($im, $image);
                imagedestroy($im);

            }else{
                echo 'image pixelate failed';
            }
        }
   }
   // finish filtering and go back to personal detail page
   if($_SESSION['role'] == "patient"){
      header("Location: personal.php");
   }else{
      header("Location: doc_detail.php");
   }
?>