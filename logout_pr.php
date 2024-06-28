 <!-- frontend index -->

 <?php
session_start();

// Unset session variables
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['email']);

// Optionally destroy the session
session_destroy();

// Use an absolute URL for redirection
header("Location: index.php?msg=logout_success");
exit();
?>
