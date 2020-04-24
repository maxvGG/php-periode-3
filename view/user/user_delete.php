<?php 
include('../../config/connect.php');
include('../../src/checklogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/styleOverzicht.css">
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
        <th style="border: 1px solid black;">delete</th>
    </tr>
    <?php 
    $sql = "SELECT * FROM `user` order by `id` asc";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()){

    ?>
    <tr>
        <td style="border: 1px solid black;"><?php echo $row['gender']; ?></td>
        <td style="border: 1px solid black;"><?php echo $row['firstName']; echo " "; echo $row['middleName']; echo " "; echo $row['lastName'] ?></td>
        <td style="border: 1px solid black;"><?php echo $row['street']; ?></td>
        <td style="border: 1px solid black;"><?php echo $row['houseNumber']; ?></td>
        <td style="border: 1px solid black;"><?php echo $row['houseNumber_addon']; ?></td>
        <td style="border: 1px solid black;"><?php echo $row['zipCode']; ?></td>
        <td style="border: 1px solid black;"><?php echo $row['city']; ?></td>
        <td style="border: 1px solid black;"><?php echo $row['country']; ?></td>
        <td style="border: 1px solid black;"><?php echo $row['phone']; ?></td>
        <td style="border: 1px solid black;"><a href="../../src/deleteuser.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure?');">delete</a></td>
    </tr>
    <?php }; ?>
    </table>
</article>
</body>
</html>