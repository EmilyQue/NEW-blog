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
<?php 
$commentText = $_GET['comments'];
$id = $_GET['id'];
$commentRate = $_GET['rate'];
$userID = $_SESSION['userid'];

$sql_statement = "INSERT INTO `comments`(`id`, `comment_text`, `posts_id`, `users_id`, `comments_rating`) VALUES (NULL, '$commentText', '$id','$userID', '$commentRate')";

?>
<body>
<?php 
if($conn){
    $result = mysqli_query($conn,$sql_statement);
    if ($result) {
        echo "Comment inserted successfully!";
        echo "Click <a href='showSearch.php'>here</a> to return";
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