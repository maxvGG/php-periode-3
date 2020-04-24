<article>
<form action="" method="post">
<?php
    include('purchase.php');
    $whereIN = implode(',', $_SESSION['cart']);
   
    
    $sql = "SELECT product.id AS id, product.name AS productName,product.description AS productDescription,product.price AS productPrice,category.name AS categoryName,product_image.image AS productImage, product.description  AS description FROM `product`INNER JOIN category on product.category_id = category.id INNER JOIN product_image on product.id = product_image.product_id where product.id IN($whereIN) GROUP BY product.id";   
    // $sql = "SELECT * FROM product where id IN($whereIN)";
   
    $results = $con->query($sql);
    
    while($row = $results->fetch_assoc()){ 
?>
<section class='row'>
    
<table>
<tr class="tr">
            <td class="td"><img src="../../assets/img/<?php echo $row['productImage'] ?>" alt="img" class="cart_img"><br><?php echo $row['productName'] ?><br> <br><?php echo $row['productPrice'] ?><br><select name="aantal" class="aantal">
                <option value="1">1</option>
                <option value="">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
            </select></td>
            <td></td>
          </tr>
          </table>
</section>

        <?php 
         
        }
        ?>
        <section>
            <input type="submit" name="submit">
        </section>
        </form>    
</article>        
