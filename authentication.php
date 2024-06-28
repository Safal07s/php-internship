<?php
// Start output buffering at the very beginning of the script
ob_start();

// Start the session
session_start();

// Check if the user is logged in
if(isset($_SESSION['email'])) {
} else {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    // Ensure no further code is executed after redirection
    exit();
}

// Rest of your page code here

// Flush the output buffer and send the content to the browser
ob_end_flush();
?>
