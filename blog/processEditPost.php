<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

$blogName = $_GET['blogTitle'];
$blogPost = $_GET['blogPost'];
$id = $_GET['id'];
$userID = $_SESSION['userid'];
$role = $_SESSION['role'];
?>
<style>
.text{
background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_6332.jpg);
    height: 100vh;
	background-size: cover;
	background-position: center;
	color: white;
	font-size: 30px;
}
a:link{
    color: white;
}
a:visited{
    color: #DAB3FF;
}
a:hover{
    color: silver;
}
a:active{
    color: black;
}
.home{
    color: white;
}
</style>
<div class= "home"></div>
<? 

if ($conn && isset($_SESSION['userid']) && $role = "admin") {
    $sql_statement = "UPDATE `posts` SET `blog_title` = '$blogName', `blog_post` = '$blogPost' WHERE `id` = '$id'";
    
    
    ?>
    <div class="text">
    <?php 
    $result = mysqli_query($conn,$sql_statement);
    if ($result) {
        echo "user id " . $_SESSION['userid'];
        echo "number of rows affected = " . mysqli_affected_rows($conn);
        echo "<br>Data updated successfully!";
        echo "<br>Click <a href='index.php'>here</a> to return";
    }
    else {
        echo "Error in the sql " . mysqli_error($conn);
    }
}
else {
    echo "Error connecting " . mysqli_connect_error();
}
?>
</div>