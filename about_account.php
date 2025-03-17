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
//call for database data
include "dbconnect.php";
$sql = "SELECT fname,lname,email,address,DateOfAdmission FROM users WHERE userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['userID']);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_assoc();
$fname = htmlspecialchars($rows['fname']);
$lname = htmlspecialchars($rows['lname']);
$email = htmlspecialchars($rows['email']);
$address = htmlspecialchars($rows['address']);
$DateOfAdmission = $rows['DateOfAdmission'];
$fullname = $fname . " " . $lname;
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
        <button class="about-acc-return-btn" onclick="location.href = 'index.php'">&lt</button>
        <div class="user-acc-param">
            <div class="param-description">Name:</div>
            <div class="user-acc-param-value"><?php echo htmlspecialchars($fullname) ?></div>
        </div>
        <div class="user-acc-param">
            <div class="param-description">Email:</div>
            <div class="user-acc-param-value"><?php echo htmlspecialchars($email) ?></div>
        </div>
        <div class="user-acc-param">
            <div class="param-description">Address:</div>
            <div class="user-acc-param-value"><?php echo htmlspecialchars($address) ?></div>
        </div>
        <div class="user-acc-param">
            <div class="param-description">Creation date:</div>
            <div class="user-acc-param-value"><?php echo htmlspecialchars($DateOfAdmission) ?></div>
        </div>
        <form method="POST" action="logout.php" onsubmit="return confirm('Are you sure you want to log out?');">
            <button id="logout-btn" name="logout" type="submit">LOGOUT</button>
        </form>
        <form method="POST" action="delete_account.php" onsubmit="return confirm('Are you sure you want to delete your account?');">
            <button id="delete-acc-btn" name="delete_account" type="submit">DELETE ACCOUNT</button>
        </form>
    </div>
</body>
</html>