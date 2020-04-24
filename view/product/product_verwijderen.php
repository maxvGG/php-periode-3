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
    <a href="card.php">cart</a>
    </nav>
</header>
<?php 
    //    $sql = "SELECT id AS id,name AS productName,description AS productDescription price AS productPrice from product"; 
        $sql = "SELECT product.id AS id, product.name AS productName,product.description AS productDescription,product.price AS productPrice,category.name AS categoryName,product_image.image AS productImage, product.description  AS description FROM `product`INNER JOIN category on product.category_id = category.id INNER JOIN product_image on product.id = product_image.product_id GROUP BY product.id";
        $results = $con->query($sql);

        while($row = $results->fetch_assoc()){ 
    ?>
    <form action="" method="post">
        <section id="<?php echo $row['id'];?>">
            <div class="product">
                   <figure id="<?php echo $row['id'];?>">
                       <img src="../../assets/img/<?php echo $row['productImage'];?>" alt="img">
                        <figcaption><?php echo $row['description']?></figcaption>
                   </figure>
                   <button value="<?php  echo $row['id']?>" name="delete" type="submit" id="delete">delete : <?php  echo $row['productName']?></button>
                   <!-- <input type="submit" value="<?php echo $row['id'];?>" name="delete" id="delete"> -->
            </div>
        </section>
    </form>
    <?php  
    if(isset($_POST['delete'])){
        $id = dbp($_POST['delete']);
        $int = (int)$id;
        // . " DELETE * FROM product_image where product_id = " . $int . ";"
        $sql =" DELETE FROM product where id =" . $int . ";" . " DELETE FROM product_image where product_id = " . $int . ";" ;
        if($con->query($sql) === true) {
            echo "deleted";
            $sql->execute();
            $sql->close();
            header("Location: product_verwijderen.php");
        } else {
            echo $con->error;
        }
        
    }
    }
    
    
    ?>
    </article>

</body>
</html>
