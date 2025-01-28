<?php
if($_SERVER["REQUEST_METHOD"] == "GET"){
    include "dbconnect.php";
    $email = $GET["email"];
    
    $sql = "SELECT * from users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $num_rows = $result->num_rows;

    if($num_rows > 0){
        echo "exists";
    }elseif($num_rows === 0){
        echo "available";
    }

    $stmt->close();
    $conn->close();
}
?>