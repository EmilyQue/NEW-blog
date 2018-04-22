 <?php 
 session_start();
 require_once 'showMenu.php';
 $id = $_GET['id'];

 //we know the id 
 // select the rest of values from database
 require_once 'connector_blog.php';

 if ($conn) {
     $sql_statement = "SELECT * FROM `posts` WHERE `id` = '$id' LIMIT 1";
     $result = mysqli_query($conn, $sql_statement);
     if ($result) {
         while ($row = mysqli_fetch_assoc($result)) {
             $blogName = $row['blog_title'];
             $blogPost = $row['blog_post'];
             
         }
     } else {
         echo "there was a sql problem " . mysqli_error($conn);
     }
 }else {
     echo "error connecting " . mysqli_connect_error();
 }
 ?>
 <style>
 .home{
background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_6332.jpg);
    height: 100vh;
	background-size: cover;
	background-position: center;
	color: white;
	font-size: 30px;
}
 
 </style>
<div class="home">
<h2>Edit a post</h2>
<p>Fill out all of the fields and submit</p>
<form action="processEditPost.php">
<input type = "hidden" name = "id" value = "<?php echo $id; ?>"></input>
Blog Title:<input type="text" name="blogTitle" value = <?php  echo $blogName; ?>></input><br>
Blog Post:<textarea rows="10" cols="100" name="blogPost"><?php echo $blogPost; ?></textarea><br>
<button type="submit">Submit Changes</button>
</form>
</div>
