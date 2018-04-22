<?php
require_once 'connector_blog.php';

$name = $_GET['full-name'];
$phone = $_GET['phone-number'];
$user = $_GET['username'];
$pw = $_GET['password'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

    $sql_statement = "INSERT INTO `users` (`id`, `name`, `phone`, `username`, `password`) VALUES (NULL, '$name', '$phone', '$user', '$pw')";
    $result = mysqli_query($conn, $sql_statement);
    
    if ($result) {
        echo "<br>Welcome, " . $user;
    }
    else {
        echo "There was a problem " . mysqli_error($conn);
    }
    header('Location: showLogin.html');
//destroy connection between php and database
mysqli_close($conn);
?>