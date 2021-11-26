<?php
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    

    //Database connection
    $conn = new mysqli('localhost','root','','signup');
    if($conn->connect_error){
        die('Connection Failed   :  ' .$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into registration(username, firstName, lastName, phone, email, password, confirmPassword
        values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisss",$username, $firstName, $lastName, $phone, $email, $password, $confirmPassword);
        $stmt->execte();
        echo "registration successfull";
        $stmt->close();
        $conn->close();
    }
?>