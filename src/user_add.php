<?php

/**
 * Standaard functie definitie
 * @param string Dit noem je een parameter (die staat tussen haakjes)
 * @return array Dit is de waarde die je functie doorgeef
 */
function setFormData(){ 
    global $con;
    // post waarden
    if(isset($_POST['gender']) && $_POST['gender'] != '') {
        $gender = dbp($_POST['gender']);
    }
    if(isset($_POST['firstName']) && $_POST['firstName'] != '') {
        $firstName = dbp($_POST['firstName']);
    }
    if(isset($_POST['middleName']) && $_POST['middleName'] != '') {
        $middleName = dbp($_POST['middleName']);
    }
    if(isset($_POST['lastName']) && $_POST['lastName'] != '') {
        $lastName = dbp($_POST['lastName']);
    }
    if(isset($_POST['street']) && $_POST['street'] != '') {
        $street = dbp($_POST['street']);
    }
    if(isset($_POST['houseNumber']) && $_POST['houseNumber'] != '') {
        $houseNumbers = dbp($_POST['houseNumber']);
        $houseNumber = (int)$houseNumbers;
    }
    if(isset($_POST['houseNumber_addon']) && $_POST['houseNumber_addon'] != '') {
        $houseNumber_addon = dbp($_POST['houseNumber_addon']);
    }
    if(isset($_POST['zipcode']) && $_POST['zipcode'] != '') {
        $zipcode = dbp($_POST['zipcode']);
    }
    if(isset($_POST['city']) && $_POST['city'] != '') {
        $city = dbp($_POST['city']);
    }
    if(isset($_POST['country']) && $_POST['country'] != '') {
        $country = dbp($_POST['country']);
    }
    if(isset($_POST['phone']) && $_POST['phone'] != '') {
        $phone = dbp($_POST['phone']);
        // $phoneint = (int)$phone;
    }
    if(isset($_POST['email']) && $_POST['email'] != '') {
        $email = dbp($_POST['email']);
    }
    if(isset($_POST['password']) && $_POST['password'] != '') {
        $password = dbp($_POST['password']);
        $pwd_hased = password_hash($password, PASSWORD_DEFAULT);
        $rechten = 2;
    }
    if(isset($_POST['newsletter']) && $_POST['newsletter'] != '') {
        $newsletter = dbp($_POST['newsletter']);
    } else {
        $newsletter = 0;
    }

    $query1 = $con->prepare("INSERT INTO `user`(gender,firstName,middleName,lastName,street,houseNumber,houseNumber_addon,zipCode,city,phone,password,country,emailadres,rechten) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
    
    $query1->bind_param('sssssisssssssi',$gender,$firstName,$middleName,$lastName,$street,$houseNumber,$houseNumber_addon,$zipcode,$city,$phone,$pwd_hased,$country,$email,$rechten);
    
    if($query1->execute() === false) {
        echo mysqli_error($con). " - 2";
        exit(__LINE__);
    } else {
        echo "costumer toegevoegd 3";
        $query1->execute();
        header('Location: index.php');
        $query1->close();
    }
}
?>