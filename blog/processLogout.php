<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<title>Logout</title>
</head>
<body>


<?php
// This module should logout the user.  Unset any $_SESSION variables, destroy the session.
session_start();
require_once 'showLogin.html';

$_SESSION = array();

session_destroy();
?>



</body>
</html>