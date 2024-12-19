<?php
// $showAlert = false;
// $showError = false; 
// $exists = false;

// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     include "dbconnect.php";

//     //saves and sanitizes form inputs
//     $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
//     $lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
//     $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
//     $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
//     $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
    
//     $sql = "Select * from users where email = '$email'";

//     //connects to the database and executes sql script
//     $result = mysqli_query($conn, $sql);
//     //checks if there are any users registered with inputed email
//     $num = mysqli_num_rows($result);

//     if($num == 0){
//         if($exists == false){
//             $hash = password_hash($password, PASSWORD_DEFAULT);

//             $sql = "INSERT INTO 'users' ('fname', 'lname', 'email', 'password', 'address', 'DateOfAddmission')
//             VALUES ('$fname', '$lname', '$email', '$hash', '$address', current_timestamp())";
            
//             $result = mysqli_query($conn, $sql);
            
//             //if query call is successful show alert for the user
//             if($result){
//                 $showAlert = true;
//             }
//         }        
//     }
//     //if email is allready in database 
//     if($num > 0){
//         $exists = "Email is not available";
//     }
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
        <div id="action-info-popup">TEST MESSAGE</div>
        <div class="register-nav-wrapper">
            <button class="register-back-btn" onclick="window.history.back()">&lt</button>
            <a href="index.php">
                <img src="images/icons/diagon-alley.svg" alt="">
            </a>
        </div>
        <h1>Sign Up</h1>
        <p>Create account and enjoy everything a wizard needs all in one place </p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="register-form-inputs-wrapper">
                <div class="register-form-inner-wrapper">
                    <label for="fname">FIRST NAME:</label>
                    <input type="text" id="fname" name="fname" pattern="[a-zA-Z]+" required>
                </div>
                <div class="register-form-inner-wrapper">
                    <label for="lname">LAST NAME:</label>
                    <input type="text" id="lname" name="lname" pattern="[a-zA-Z]+" required>
                </div>
            </div>
            <label for="email">EMAIL:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">PASSWORD:</label>
            <input type="password" id="password" name="password" minlength="6" required>
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