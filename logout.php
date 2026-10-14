<?php
session_start();

// Destroy session
session_unset();
session_destroy();

// Remove cookie
setcookie("user_name", "", time() - 3600, "/");

// Redirect back to form
header("Location: form.php");
exit();
?>
