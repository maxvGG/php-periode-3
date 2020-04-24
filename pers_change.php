<?php
include('connect.php');

$id = empty($_GET['id']) ? 0 : $_GET['id'];

$sql = 'SELECT * FROM persoon WHERE id = '.$id;

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo $row['voornaam'].'<br/>';
    echo $row['tussenvoegsel'].'<br/>';
    echo $row['achternaam'].'<br/>';
    echo $row['geslacht'].'<br/>';
    echo $row['geboortedatum'].'<br/>';
    echo $row['geboorteplaats'].'<br/>';
}

?>