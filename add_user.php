<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    include "dbconnect.php";
    echo "test";
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $address = $_POST["address"];

    // checks if email is allready in the database
    $sql = "SELECT * from users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;

    if($num_rows === 0){
        //sends form's data to database
        $sql = "INSERT INTO users (fname, lname, email, password,
        address, DateOfAdmission) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $fname, $lname, $email, $hash, $address);
        $stmt->execute();
        if ($stmt->error) {
            die("Error adding user: " . $stmt->error);
        }
        $stmt->close();
    }
    $conn->close();
    header(("Location: register-successful.php"));
}else{
    header("Location: register-error.php");
}
?>