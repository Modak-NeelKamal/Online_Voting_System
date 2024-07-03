<?php
session_start();
unset($_SESSION['admin_id']);
unset($_SESSION['users_email']);
session_destroy();
header("location:../adminlogin.php");
