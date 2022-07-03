<?php
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];


    // Database connection //
    $conn = new mysqli('localhost', 'root', '', 'registration');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt= $conn->prepare("insert into users(firstname, lastname, email, phonenumber, password)
        values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $firstname, $lastname, $email, $phonenumber, $password);
        $stmt->execute();
        echo "Registration Successfull...";
        $stmt->close();
        $conn->close();
    }

?>