<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_regenerate_id(true);
};
//if user is not logged in
if(!isset($_SESSION['userID'])){
    header("Location: index.php");
    exit();
}
if(isset($_POST['delete_account'])){
    echo "valid";
    include "dbconnect.php";
    $sql = "DELETE FROM users WHERE userID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['userID']);
    if($stmt->execute()){
        session_destroy();
        header("Location: index.php");
        exit();
    };
}
?>