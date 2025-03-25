<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
    session_regenerate_id(true);
}
?>
<script>
document.addEventListener("DOMContentLoaded", function(){
    const isLoggedIn = "<?php echo isset($_SESSION['userID']) ? 'true' : 'false';?>" === "true";
    // account button either points to about user page or login page
    // depending if user logged in or not
    const account_btn = document.querySelector(".login-btn");
    if(account_btn){
        account_btn.addEventListener("click", function(){
            window.location.href = isLoggedIn ? "about_account.php" : "login.php";
        })
    }
    // cart button shows alert window that user is not logged in if he's not
    const cart_btn = document.querySelector(".cart-btn");
    cart_btn.addEventListener("click", function(){
        if(isLoggedIn){}
        else{
            alert("Please log in first to access cart.");
        }
    })
})

</script>