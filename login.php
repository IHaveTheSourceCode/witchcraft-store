<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_regenerate_id(true);
};
//if user is not logged in
if(isset($_SESSION['userID'])){
    header("Location: index.php");
    exit();
}
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if($error){
        echo "<div id='login-error-popup'>$error</div>";
    }?>
    <div id="register-page">
        <div class="register-nav-wrapper">
            <button class="register-back-btn" onclick="window.history.back()">&lt</button>
            <a href="index.php">
                <img src="images/icons/diagon-alley.svg" alt="">
            </a>
        </div>
        <h1>Sign In</h1>
        <form method="post" action="login_user.php" id="registration-form">
            <label for="email">EMAIL:</label>
            <input type="email" id="email" name="email" required>
            <span id="email-feedback" class="register-error"></span>
            <label for="password">PASSWORD:</label>
            <input type="password" id="password" name="password" minlength="6" required>
            <button type="submit" class="form-btn register-submit-btn">
                LOGIN
            </button>
        </form>
        <div class="login-label-wrapper">
            <p>Not registered?</p>
        </div>
        <button class="form-btn register-login-btn" onclick="location.href = 'register.php';">CREATE ACCOUNT</button>
    </div>
</body>
</html>