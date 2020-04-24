<?php 


function setFormData(){
    global $con; // connectie
        
    if(isset($_POST['productName'])  && $_POST['productName'] != ''){
        $productName = dbp($_POST['productName']);
    }
    if(isset($_POST['productPrice'])  && $_POST['productPrice'] != ''){
        $productprice = dbp($_POST['productPrice']);
    }
    if(isset($_POST['description'])  && $_POST['description'] != ''){
        $description = dbp($_POST['description']);
    }
    if(isset($_POST['platform'])  && $_POST['platform'] != ''){
        $platform = dbp($_POST['platform']);
    }
    if(isset($_POST['age']) && $_POST['age'] != ''){
        $age = dbp($_POST['age']);
    }
    if(isset($_POST['active'])  && $_POST['active'] != ''){
        $active = dbp($_POST['active']);
    }
    if(isset($_POST['category'])  && $_POST['category'] != ''){
        $category = dbp($_POST['category']);
    }
    if(isset($_POST['submit'])){
        @$file = $_FILES['file'];
 
        @$fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
 
        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
 
        $allowed = array('jpg','jpeg','png');
 
        if(in_array($fileActualExt, $allowed)){
             if($fileError === 0){
                 if($fileSize < 1000000){
                     $fileNameNew = uniqid('', true) . ".". $fileActualExt;
                     $fileDestination = '../../assets/img/' . $fileNameNew;
                     move_uploaded_file($fileTmpName,$fileDestination);
                    
                 } else {
                     echo "Your file is to big";
                   
                 }
             } else {
                 echo "There was an error uploading your file";
               
             }
        } else {
            echo "You cannot upload files of this type!";
            
        }
    }
    $activeint = (int)$active;
    $activeint2 = (int)$active;
    $ageint = (int)$age;
    $priceint = (int)$productprice;
   
    $sql = $con->prepare("INSERT INTO product(name,description,category_id,price,ageRestriction,active) VALUES(?,?,?,?,?,?);");
    
    
   
    
   


  
     
    $sql->bind_param('sssdii',$productName,$description,$category,$priceint,$ageint,$activeint);
    
    if ($sql === false) {
        echo mysqli_error($con)." - <br> 123";
        exit(__LINE__);
    } else {
        $sql->execute();
        
        $sql3 = 'SELECT * FROM `product` WHERE name = "'.$productName. '";';
        $result = mysqli_query($con,$sql3);
        
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result); 
            $id = $row['id'];
            $int = (int)$id;
        }
        
        
        
        
       
        $sql2 = $con->prepare("INSERT INTO product_image(product_id,image,active) VALUES (?,?,?);");
        $sql2->bind_param('isi',$int,$fileNameNew,$activeint2);
       
        if($sql2 === false){
            echo mysqli_error($con)." - ";
            echo 'test';
            exit(__LINE__);
        } else {
            
            echo "product toegevoegd";
            
           
            $sql2->execute();
            $sql->close();
            $sql2->close();
        }
        header('Location: product_overzicht.php');
    }

}

?>
