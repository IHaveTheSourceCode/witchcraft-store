<?php
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    include "dbconnect.php";
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT password,userID FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;

    if($num_rows > 0){
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if(password_verify($password, $hashed_password)){
            $_SESSION['userID'] = $row['userID'];
            header('Location: ./index.php');
        }else{
            #refresh site and pass error value to login page
            $_SESSION['error'] = "Invalid email or password";
            header('Location: ./login.php');
        }
    }else{
        $_SESSION['error'] = "Invalid email or password";
        header('Location: ./login.php');
    }
    $stmt->close();
    $conn->close();
}
?>