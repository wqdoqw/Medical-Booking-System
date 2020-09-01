<?php
session_start();
if(isset($_SESSION['account']) && isset($_SESSION['password']) && isset($_SESSION['role']) ){
    if($_SESSION['role'] == "patient"){
      header("location: dashboard.php");
    }else{
      header("location: doctordashboard.php");
    }
}
?>