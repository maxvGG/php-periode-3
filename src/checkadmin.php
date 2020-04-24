<?php 
    @session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "'1") {
    // dd($_SESSION['name']);
    // echo "welcome". $_SESSION['name']. "!";
    echo"<sript>console.log('ingeloged')</script>";
    // dd($_SESSION);
} else {
    // echo $_SESSION['loggedin'];
    session_destroy();
    // dd($_SESSION);
    header('Location: /school/php-periode-3/view/login_user.php');
    exit;
}

?>