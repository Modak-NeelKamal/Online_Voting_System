<?php

$session_timeout = 1000;
// Check for timeout
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $session_timeout)) {
    // Last activity was more than $session_timeout seconds ago
    session_unset(); // Unset $_SESSION variable for the run-time
    session_destroy(); // Destroy session data in storage
    header("Location: ../adminlogin.php"); // Redirect to login page
    exit();
}

// Update last activity time stamp
$_SESSION['LAST_ACTIVITY'] = time();
