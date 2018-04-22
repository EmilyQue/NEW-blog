<?php
//Blog Page Version 1
//Emily Quevedo, Almicke "Mickey" Navarro
//Date: February 2, 2018

session_start(); 
require_once 'showMenu.php';
require_once 'connector_blog.php';

$user = $_GET['user'];
$pw = $_GET['pw'];

$sql = "SELECT * FROM users WHERE Username = '$user' AND Password = '$pw' LIMIT 1";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
}
echo "Connected successfully";

//check the database for the username and password
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) == 1) {
     $row = mysqli_fetch_array($result);
        echo "<br>Welcome " . $user . "!<br>";
        $_SESSION['username'] = $row['username'];
        $_SESSION['userid'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        header('Location: index.php');
}

else {
    echo "<br> Invalid username and/or password <br>";
}


//destroy the connection between the PHP code and the database
mysqli_close($conn);
?>
