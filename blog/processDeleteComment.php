<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<style>
body{
	background-image: url(20170605_124524.jpg);
	background-size: cover;
	background-position: center;
	color: white;
	font-size: 20px;
	padding-top: 15px;
	padding-left: 25px;
}
</style>
<body>
<div class="delete">
<?php 

$deleteComment = $_GET['comment_id'];

$sql_statement = "DELETE FROM `comments` WHERE `comments`.`id` = '$deleteComment'";

if ($conn) {
    $result = mysqli_query($conn, $sql_statement);
    if ($result) {
        echo "Deleted comment " . $deleteComment . "<br>";
        echo "Click here <a href='showCommentsAdmin.php'>here</a> to return";
    } else {
        echo "Error with the SQL " . mysqli_error($conn);
    }
} else {
    echo "Error connecting " . mysqli_connect_error();
}
?>
</body>
</div>