<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    include "dbconnect.php";
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_rows = $result->num_rows;

    if($num_rows > 0){
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if(password_verify($password, $hashed_password)){
            echo "Valid";
        }else{
            echo "Invalid email or password";
        }
    }
    $stmt->close();
    $conn->close();
}
?>