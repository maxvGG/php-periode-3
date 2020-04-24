<?php 
 include('../config/connect.php');
    include('checklogin.php');
   

function buy() {
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    header("Location: ../view/product/card.php?id=$id");
}
buy();
?>