<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
};
//if user is not logged in
if(!isset($_SESSION['userID'])){
    header("Location: index.php");
    exit();
}
//call for database data
include "dbconnect.php";
$sql = "SELECT fname,lname,email,address,DateOfAdmission FROM users WHERE userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['userID']);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_assoc();
$fname = $rows['fname'];
$lname = $rows['lname'];
$email = $rows['email'];
$address = $rows['address'];
$DateOfAdmission = $rows['DateOfAdmission'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About account</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div id="about-acc-main">
        <div class="user-acc-param">
            <div class="param-description">Name:</div>
            <div class="user-acc-param-value"><?php echo $fname, " ", $lname ?></div>
        </div>
        <div class="user-acc-param">
            <div class="param-description">Email:</div>
            <div class="user-acc-param-value"><?php echo $email ?></div>
        </div>
        <div class="user-acc-param">
            <div class="param-description">Address:</div>
            <div class="user-acc-param-value"><?php echo $address ?></div>
        </div>
        <div class="user-acc-param">
            <div class="param-description">Creation date:</div>
            <div class="user-acc-param-value"><?php echo $DateOfAdmission ?></div>
        </div>
        <form method="POST" action="delete_account.php" onsubmit="return confirm('Are you sure you want to delete your account?');">
            <button id="delete-acc-btn" type="submit">DELETE ACCOUNT</button>
        </form>
    </div>
</body>
</html>