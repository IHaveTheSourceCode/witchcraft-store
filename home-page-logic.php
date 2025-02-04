<?php
session_start();
?>
<script>
// account button either points to about user page or login page
// depending if user logged in or not
document.addEventListener("DOMContentLoaded", function(){
    const isLOggedIn = "<?php isset($_SESSION['userID']) ? 'true' : 'false';?>";
    const account_btn = document.querySelector(".login-btn");
    if(account_btn){
        account_btn.addEventListener("click", function(){
            window.location.href = isLOggedIn ? "about_account.php" : "login.php";
        })
    }
})
</script>