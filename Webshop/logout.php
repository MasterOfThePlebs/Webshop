<?php
session_start();
$_SESSION["loggedin"] = false;
$_SESSION["userid"] = "";
$_SESSION["isAdmin"] = 0;
header('Location: login.php');