<?php
// $showAlert = false;
// $showError = false; 
// $exists = false;

// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     include "dbconnect.php";

//     $fname = $_POST["fname"];
//     $lname = $_POST["lname"];
//     $fname = $_POST["fname"];
//     $fname = $_POST["fname"];
//     $fname = $_POST["fname"];
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="register-page">
        <div class="register-nav-wrapper">
            <button class="register-back-btn" onclick="window.history.back()">&lt</button>
            <a href="index.php">
                <img src="images/icons/diagon-alley.svg" alt="">
            </a>
        </div>
        <h1>Sign Up</h1>
        <p>Create account and enjoy everything a wizard needs all in one place </p>
        <form action="" type="POST">
            <div class="register-form-inputs-wrapper">
                <div class="register-form-inner-wrapper">
                    <label for="fname">FIRST NAME:</label>
                    <input type="text" id="fname" name="fname" required>
                </div>
                <div class="register-form-inner-wrapper">
                    <label for="lname">LAST NAME:</label>
                    <input type="text" id="lname" name="lname" required>
                </div>
            </div>
            <label for="email">EMAIL:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">PASSWORD:</label>
            <input type="password" id="password" name="password" required>
            <label for="address">ADDRESS:</label>
            <input type="text" id="address" name="address" required>
            <button type="submit" class="form-btn register-submit-btn">
                SIGN UP
            </button>
        </form>
        <div class="login-label-wrapper">
            <p>Allready have an account?</p>
        </div>
        <button class="form-btn register-login-btn">LOG IN</button>
    </div>
</body>
</html>