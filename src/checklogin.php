<?php 
    @session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "'1") {
    // echo "welcome". $_SESSION['name']. "!";
    echo"<script>console.log('ingeloged')</script>";
    if($_SESSION['permissions'] === '2'){
        $_SESSION['admin'] = true;
    } else {
        $_SESSION['admin'] = false;
    }
    // dd($_SESSION);
} else {
    // echo $_SESSION['loggedin'];
    session_destroy();
    // dd($_SESSION);
    header('Location: /school/php-periode-3/view/login_user.php');
    exit;
}

?>