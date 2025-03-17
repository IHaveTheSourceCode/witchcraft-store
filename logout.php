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
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: index.php");
    exit();
}
?>