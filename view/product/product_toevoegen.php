<?php 
include('../../config/connect.php');
include('../../src/product_toevoegen.php');
include('../../src/checklogin.php');

if(!empty($_POST)){
    $sfd = setFormData();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/styleOverzicht.css">
</head>
<body>
<header>
    <nav>
    <a href="product_overzicht.php">producten </a>
    <?php if(isset($_SESSION['admin'] && $_SESSION['admin'] === true)) { ?> 
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
<form action="product_toevoegen.php" method="post" enctype="multipart/form-data">
<div class="row justify-content-md-center">
<div class="form-group">
<label for="productName">product Name</label>
    <input type="text" name="productName" class="form-control" placeholder="product name">
    <input type="text" name="productPrice" class="form-control" placeholder="price">
    <input type="text" name="description" class="form-control" placeholder=" description" >
    <input type="text" name="platform" class="form-control" placeholder=" platform">
    <select name="age" id="age" class="form-control">
        <option value="0">All</option>
        <option value="12">12+</option>
        <option value="18">18+</option>
    </select>
    <select name="category" class="form-control" id="category">
    <option value="1">openworld</option>
    <option value="2">action</option>
    <option value="3">fps</option>
    <option value="4">local</option>
    <option value="5">multiplayer</option>
    <option value="6">anime</option>
    </select>
    <input type="file" name="file"class="form-control" >
    <input type="hidden" name="active" value="1">
    <input type="submit" name='submit' class="btn btn-info">
    </div>
    </div>
    <!-- hidden input where active = 1 -->
</form>
</body>
</html>
