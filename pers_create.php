<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Aanmaken persoon</title>
</head>
<body>
<?php
include('connect.php');
if(!isset($_POST['submit'])){
    // toon het form voor de invoer van een persoon
?>
    <form method="post">
        <input type="text" name="field_voornaam" placeholder="Voornaam">
        <input type="text" name="field_tussenvoegsel" placeholder="Tussenvoegsel">
        <input type="text" name="field_achternaam" placeholder="Achternaam">
        <input type="submit" name="submit" value="Klik mij">
    </form>
<?php
}else{
    // anders verwerk de invoer naar de database (was verwerk_create.php)
    $voornaam = $_POST['field_voornaam'];
    $tussenvoegsel = $_POST['field_tussenvoegsel'];
    $achternaam = $_POST['field_achternaam'];

    $sql = "INSERT INTO persoon (voornaam, tussenvoegsel, achternaam)
    VALUES('$voornaam', '$tussenvoegsel', '$achternaam')";

    $result = $conn->query($sql);
}
?>
<br/>
<br/>
<a href="index.php">Klik om terug te gaan</a>
</body>
</html>