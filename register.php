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
            <label for="FName">FIRST NAME:</label>
            <input type="text" id="FName" name="FName" required>
            <label for="LName">LAST NAME:</label>
            <input type="text" id="LName" name="LName" required>
            <label for="email">EMAIL:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">PASSWORD:</label>
            <input type="password" id="password" name="password" required>
            <label for="addres">ADDRES</label>
            <input type="text" id="addres" name="addres" required>
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