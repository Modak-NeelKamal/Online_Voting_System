<?php
session_start();
unset($_SESSION['users_name']);
unset($_SESSION['users_email']);
unset($_SESSION['useridgenerated']);
session_destroy();
header("location:../login.php");
