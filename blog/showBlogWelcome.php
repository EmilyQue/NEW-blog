<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<title>Welcome</title>
</head>
<style>
h1{
    font-family: arial;
    font-size: 70px;
    color: white;
    padding-top: 230px;
    padding-left: 50px;
}
p{
    font-size: 30px;
    color: white;
    font-family: arial;
    float: left;
	text-align: center;
	padding: 23px 16px;
	text-decoration: none;
}
.intro{
	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(trevi.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
}
</style>
<body>
<?php 
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<div class="intro">
<h1>Travel With Us!</h1>
<p>Welcome to our travel blog! Follow along as people from different places share their experience traveling the world!</p>
</div>

</body>
</html>