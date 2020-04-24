<?php 
    function setFormData(){
        global $con; // dit is je database connectie
        if(isset($_POST['field_firstname']) && $_POST['field_firstname'] != ''){
            $firstname = dbp($_POST['field_firstname']);
        }else{
            echo "Voornaam is verplicht";
        }
        if(isset($_POST['field_password']) && $_POST['field_password'] != ''){
            $password = dbp($_POST['field_password']);
            $pwd_hashed = password_hash ($password , PASSWORD_DEFAULT);
        }else{
            echo "Password is verplicht";
        }
        if(isset($_POST['field_infix']) && $_POST['field_infix'] != ''){
            $middlename = dbp($_POST['field_infix']);
        }else{
            echo "middle name is verplicht";
        }
        if(isset($_POST['field_lastname']) && $_POST['field_lastname'] != ''){
            $lastname = dbp($_POST['field_lastname']);
        }else{
            echo "last is verplicht";
        }
        if(isset($_POST['field_email']) && $_POST['field_email'] != ''){
            $email = dbp($_POST['field_email']);
        }else{
            echo "email";
        }
        if(isset($_POST['field_gender']) && $_POST['field_gender'] != ''){
            $gender = dbp($_POST['field_gender']);
        }else{
            echo "";
        }
        if(isset($_POST['field_street']) && $_POST['field_street'] != ''){
            $street = dbp($_POST['field_street']);
        }else{
            echo "street";
        }
        if(isset($_POST['field_housenumber']) && $_POST['field_housenumber'] != ''){
            $house = dbp($_POST['field_housenumber']);
        }else{
            echo "housenumber";
        }
        if(isset($_POST['field_addon']) && $_POST['field_addon'] != ''){
            $addon = dbp($_POST['field_addon']);
        }else{
            echo "addon";
        }
        if(isset($_POST['field_zipcode']) && $_POST['field_zipcode'] != ''){
            $zipcode = dbp($_POST['field_zipcode']);
        }else{
            echo "zipcode";
        }
        if(isset($_POST['field_city']) && $_POST['field_city'] != ''){
            $city = dbp($_POST['field_city']);
        }else{
            echo "city";
        }
        if(isset($_POST['field_country']) && $_POST['field_country'] != ''){
            $country = dbp($_POST['field_country']);
        }else{
            echo "country";
        }
        if(isset($_POST['field_phone']) && $_POST['field_phone'] != ''){
            $phone = dbp($_POST['field_phone']);
        }else{
            echo "phone";
        }
        if(isset($_POST['field_date']) && $_POST['field_date'] != ''){
            $date = dbp($_POST['field_date']);
        }else{
            echo "date";
        }
        

    
        // pwd_hashed in bind_param zetten nog niet gelukt 
        $query1 = $con->prepare("INSERT INTO costumer(firstname,middlename,lastname,emailadress,password,gender,street,houseNumber,houseNumber_addon,zipCode,city,country,phone) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");
        
        if ($query1 === false) {
            echo mysqli_error($con)." - ";
            exit(__LINE__);
        }
        // hashed password zit er nog niet in 
        $query1->bind_param('sssssssisssss', $firstname,$middlename,$lastname,$email,$pwd_hashed,$gender,$street,$house,$addon,$zipcode,$city,$country,$phone);
        if ($query1->execute() === false) {
            echo mysqli_error($con)." - ";
            exit(__LINE__);
        } else {
            echo "Gebruiker toegevoegd";
            header('location: login_costumer.php');
            $query1->close();
        }
        
    }

?>