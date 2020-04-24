<?php 
include('../../config/connect.php');
include('../../src/checklogin.php');

if(empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if(isset($_GET['id'])) {
    array_push($_SESSION['cart'], $_GET['id']); 
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/styleOverzicht.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
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
                <a href="card.php">cart</a>
            </nav>
        </header>
        <main>
                <article>
                    <?php  include('../../src/card.php');?>
                </article>
        </main>

    </div>
</body>
</html>