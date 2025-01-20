<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "dbconnect.php";

    $fname = $_POST("fname");
    $lname = $_POST("lname");
    $email = $_POST("email");
    $hash = password_hash($_POST("password"), PASSWORD_DEFAULT);
    $address = $_POST("address");

    //sends form's data to database
    $sql = "INSERT INTO users (fname, lname, email, password,
    address, DateOfAdmission) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fname, $lname, $email, $hash, $address);
    $stmt->execute();
}
?>