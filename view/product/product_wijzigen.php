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
    <?php if(isset($_SESSION['admin'] && $_SESSION['admin'] === true) { ?> 
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
<article>
    <?php 
        
        $sql = "SELECT product.id AS id, product.name AS productName,product.description AS productDescription,product.price AS productPrice,category.name AS categoryName,product_image.image AS productImage, product.description AS description FROM `product`
        INNER JOIN category on product.category_id = category.id INNER JOIN product_image on product.id = product_image.product_id GROUP BY product.id;";
        $results = $con->query($sql);

        while($row = $results->fetch_assoc()){ 
    ?>
        <section>
            <div class="product">
                   <figure id="<?php echo $row['id'];?>">
                       <img src="../../assets/img/<?php echo $row['productImage'];?>" alt="img">
                        <figcaption><?php echo $row['productName']?></figcaption>
                        <form action="" method="post">
                        <input type="hidden" name="hidden" value="<?php echo $row["id"];?>">
                        <input type="text" name="titel" id="titel">
                        <input type="submit" name="submit" value="change">
                        </form>
                   </figure>
            </div>
        </section>
    <?php  
    
        if(isset($_POST['submit'])){
            if(isset($_POST['titel']) && isset($_POST['hidden'])){
                $titel = $_POST['titel'];
                $id = $_POST['hidden'];
                $idint = (int)$id;
                @$sql2 = $con->prepare('UPDATE product SET name = "' .$titel.'" WHERE id = ?');

                if($sql2 === false){
                    echo mysqli_error($con)." - ";
                    exit(__LINE__);
                }
                $sql2->bind_param('i',$idint);
                if($sql2->execute() === false){
                    echo mysqli_error($con)." - ";
                    exit(__LINE__);
                } else {
                    $sql2->execute();
                    $sql2->close();
                    header('Location: product_wijzigen.php');
                }
                // $result = $con->query($sql);
            }
        }
    }
    ?>
    </article>
</body>
</html>