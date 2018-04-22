<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

$id = $_GET['id'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$user = $_GET['user'];
$pass = $_GET['pass'];
$role = $_GET['role'];

$userID = $_SESSION['users_id'];
$role = $_SESSION['role'];

echo "user id " . $_SESSION['users_id'];
if ($conn && isset($_SESSION['users_id']) && $_SESSION['role'] == "admin") {
    $sql = "UPDATE `users` SET `name` = '$name', `phone` = '$phone', `username` = '$user', `password` = '$pass', `role` = '$role' WHERE `users`.`id` = '$id'";
    
    
    ?>
    <style>
    body{
     background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(20170605_105312.jpg);
    height: 100vh;
	background-size: cover;
	background-position: center;
	color: white;
    }
    </style>
    <body>
    <?php 
    $result = mysqli_query($conn,$sql_statement);
    if ($result) {
        echo "number of rows affected = " . mysqli_affected_rows($conn);
        echo "<br>Data updated successfully!";
        echo "<br>Click <a href='showUserAdmin.php'>here</a> to return";
    }
    else {
        echo "Error in the sql " . mysqli_error($conn);
    }
}
else {
    echo "Error connecting " . mysqli_connect_error();
}
?>
</body>