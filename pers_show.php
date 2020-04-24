<!doctype html>
<html>
<body>
<?php
// Onderhoud persoon | Tonen
// Door: Peter Bijker
// Datum: 3 februari 2017

// Database connectie
require_once 'connect.php';
$id = $_GET['id'];
?>
<br/>
<table border="1">
<?php
// Query uitvoeren
$sql = 'SELECT * FROM persoon WHERE id='.$id;
$result = $conn->query($sql);
// Gegevens (of resultaat) laten zien
while($row = $result->fetch_assoc()) {
	echo '<tr><td>id</td><td>'.$row['id'].'</td></tr>';
	echo '<tr><td>Voornaam</td><td>'.$row['voornaam'].'</td></tr>';
	echo '<tr><td>Tussenvoegsel</td><td>'.$row['tussenvoegsel'].'</td></tr>';
	echo '<tr><td>Achternaam</td><td>'.$row['achternaam'].'</td></tr>';
	echo '<tr><td>Geslacht</td><td>'.$row['geslacht'].'</td></tr>';
	echo '<tr><td>Geboortedatum</td><td>'.$row['geboortedatum'].'</td></tr>';
	echo '<tr><td>Geboorteplaats</td><td>'.$row['geboorteplaats'].'</td></tr>';
}
?>
</table>
<br/>
<br/>
<a href="index.php">Klik om terug te gaan</a>
</body>
</html>