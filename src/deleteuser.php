<?php 
include('../config/connect.php');


if(isset($_REQUEST['id']) && $_REQUEST['id'] != ''){
    $id = dbp($_REQUEST['id']);
    
} else {
    header('Location: ../view/user/user_delete.php?deleted="nee"');
    exit;
}
$sql ="DELETE FROM `user` where id =". $id;


if ($con->query($sql) === TRUE){
    echo "Record deleted successfully";
    header('Location: ../view/user/user_delete.php?');
    
} else {
    echo "Error deleting record: " . $con->error;
}
$con->close();


?>
