<?php
include("_variables.php");

$con = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);

if(!$con or mysqli_connect_errno()){
    echo mysqli_error($con);
}else{
    $con->set_charset("utf8");
    $con->query("SET lc_time_names = 'nl_NL';");
} 

include("session.php");

function dd($expression){
    echo "<pre>";
    var_dump($expression);
    echo "</pre>";
    die();
}

function dbp($waarde){
    global $con;
    return mysqli_escape_string($con,$waarde);
}
?>