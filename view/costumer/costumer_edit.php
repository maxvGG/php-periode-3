<?php 
include('../../config/connect.php');
include('../../src/checklogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/styleOverzicht.css">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
    <a href="product_overzicht.php">producten </a>
    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) { ?> 
    <a href="product_toevoegen.php">product toevoegen </a>
    <a href="product_verwijderen.php">product verwijderen </a>
    <a href="../user/user_add.php">admin toevoegen</a>
    <a href="../user/user_delete.php">admin verwijderen</a>
    <a href="../user/user_overview.php">admin overview</a>
    <a href="../costumer/costumer_delete.php">costumer verwijderen</a>
    <?php } ?> 
    <a href="../../src/logout.php">log out</a>
    </nav>
</header>
<article>
<table style="border: 1px solid black;">
    <tr >
        <th style="border: 1px solid black;">gender</th>
        <th style="border: 1px solid black;">name</th>
        <th style="border: 1px solid black;">street</th>
        <th style="border: 1px solid black;">house number</th>
        <th style="border: 1px solid black;">addon</th>
        <th style="border: 1px solid black;">zipcode</th>
        <th style="border: 1px solid black;">city</th>
        <th style="border: 1px solid black;">country</th>
        <th style="border: 1px solid black;">phone</th>
        <!-- <th style="border: 1px solid black;">edit</th> -->
    </tr>
    <?php 
    $sql = "SELECT * FROM `costumer` order by `id` asc";
    $result = $con->query($sql);
    $gender = 'gender';
    $firstname = 'firstName';
    $street = 'street';
    $house = 'houseNumber';
    $addon = 'houseNumber_addon';
    $zip = 'zipCode';
    $city = 'city';
    $country = 'country';
    $phone = 'phone';
    $function = true;
    while($row = $result->fetch_assoc()){

    ?>
    <tr>
       <td style="border: 1px solid black;"><span onclick="change('gender')" id='<?php echo $row["id"]?>'><?php echo $row['gender']; ?></span></td>
        <td style="border: 1px solid black;"><span onclick="change('firstName')"><?php echo $row['firstName']; echo " "; echo $row['middleName']; echo " "; echo $row['lastName'] ?></span></td>
        <td style="border: 1px solid black;"><span onclick="change('street')"><?php echo $row['street']; ?></span></td>
        <td style="border: 1px solid black;"><span onclick="change('houseNumber')"><?php echo $row['houseNumber']; ?></span></td>
        <td style="border: 1px solid black;"><span onclick="change('houseNumber_addon')"><?php echo $row['houseNumber_addon']; ?></span></td>
        <td style="border: 1px solid black;"><span onclick="change('zipCode')"><?php echo $row['zipCode']; ?></span></td>
        <td style="border: 1px solid black;"><span onclick="change('city')" ><?php echo $row['city']; ?></span></td>
        <td style="border: 1px solid black;"><span onclick="change('country')"><?php echo $row['country']; ?></span></td>
        <td style="border: 1px solid black;"><span onclick="change('phone')"><?php echo $row['phone']; ?></span></td>
        
    </tr>
            

            
        
    <?php 
       
    }; 
    ?>
    </table>
</article>
<script src="../../assets/js/script2.js"></script>
</body>
</html>