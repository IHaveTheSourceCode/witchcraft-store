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
            <button class="register-back-btn">&lt</button>
            <a href="index.php">
                <img src="images/icons/diagon-alley.svg" alt="">
            </a>
        </div>
        <h1>Sign Up</h1>
        <p>Create account and enjoy everything a wizard needs all in one place </p>
        <form action="" type="POST">
            <label for="FName">First Name:</label>
            <input type="text" id="FName" name="FName" required>
            <label for="LName">Last Name:</label>
            <input type="text" id="LName" name="LName" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password: id="password" name="password" required>
            <label for="addres">Addres</label>
            <input type="text" id="addres" name="addres" required>
            <button type="submit" id="register-submit-btn">
                Submit
            </button>
        </form>
    </div>
</body>
</html>