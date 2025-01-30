<?php
session_start();
?>
<script>
// account button either points to about user page or login page
// depending if user logged in or not
const userID = "<?php echo $_SESSION['userID'];?>";
const account_btn = document.querySelector("login-btn");
</script>