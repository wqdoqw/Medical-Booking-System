<?php
session_start();
?>

<?php
 
    // unset session
    unset($_SESSION);
    $_SESSION = array();
    // unset post variables
    $_POST = array();
    //destroy the session
    session_destroy();
    header("Location: lndex.php");
?>