<?php
     function setformdata(){
        
        global $con;
        if(isset($_POST['field_email']) && $_POST['field_email'] != ''){
            $email = dbp($_POST['field_email']);
        }else{
            echo "email is verplicht";
        }
        if(isset($_POST['field_password']) && $_POST['field_password'] != ''){
            $password = dbp($_POST['field_password']);
                   
            $sql = "SELECT * FROM user WHERE emailadres = '$email'";    
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($result);
            $source = $row['password'];
            $permissions = $row['rechten'];
        }
        $sql = "SELECT emailadres FROM user WHERE emailadres = '$email'";
        
        if($stmt = mysqli_prepare($con,$sql)){
            
            @mysqli_stmt_bind_param($stmt,'s',$email);

            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    @mysqli_stmt_bind_result($stmt,$email,$source);
                    if(mysqli_stmt_fetch($stmt)){

                        if(password_verify($password,$source)){

                            session_start();

                            $_SESSION['loggedin'] = true;
                            $_SESSION['name'] = dbp($row['name']);
                            $_SESSION['permissions'] = $permissions;
                            // dd($_SESSION['permissions']);
                            
                            // $_SESSION['permissions'] = $rechten;
                            
                            header('Location: ../view/product/product_overzicht.php');
                        } else {
                            echo"<script>alert('password of email adress is niet goed ingevult')</script>";
                        }
                    }
                }
            }
        }
    }

?>