<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

$postTitle = $_GET['postTitle'];
$postBody = $_GET['postBody'];
$user_id = $_SESSION['userid'];
?>
<body>
<style>
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
body{
background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_2336.jpg);
	background-size: cover;
	background-position: center;

	}
.text{
    color:white;
    padding-top: 100px;
	text-align: center;
	font-size: 30px;
}
</style>

<?php 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
   
    
$sql_statement = "INSERT INTO `posts`(`blog_title`, `blog_post`, `users_id`) VALUES ('$postTitle', '$postBody', '$user_id')";
$result = mysqli_query($conn, $sql_statement);
?>
<div class="text">
<?php 
if ($result) {
    echo "Success! You have created a new blog post!<br>";
    echo "Click <a href=showAllPosts.php>here</a> to view your post!<br>"; 
}
else {
    echo "There was a problem " . mysqli_error($conn);
}

?>
</div>
</body>