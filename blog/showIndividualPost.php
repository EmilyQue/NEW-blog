<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<title>Blog Posts</title>
</head>
<style>
body{
	background-image: url(IMG_0325.jpg);
	height: 95vh;
	background-size: cover;
	background-position: center;
    margin: 10px;
}
h2{
    color:white;
    font-size: 30px;
}
.links{
    color: white;
    font-size: 30px;
}
</style>
<body>
<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<div class="home">
<h2>
<?php 
$user_id = $_SESSION['userid'];
$post_id = $_GET['id'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT `id`, `blog_title`, `blog_post`, `users_id` FROM `posts` WHERE `users_ID` = '$user_id' AND `id` = '$post_id'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
echo $row ["blog_title"] . "<br>";
echo "<br>";
?>
</h2>

<div class="links">

<?php
echo $row ["blog_post"] . "<br>";
?>
</div>
</div>

</body>
</html>