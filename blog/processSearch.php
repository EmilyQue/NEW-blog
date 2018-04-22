<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<style>
.search{
	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_1197.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
	font-size: 25px;
	color: white;
	text-align: center;
	padding-top: 150px; 

}
</style>
<?php 
$blogTitle = $_GET['blogName'];
$blogText = $_GET['blogComment'];

if ($conn) {
    
    $sql_statement = "SELECT posts.*, users.id AS users, users.name FROM `posts` JOIN `users` ON users.id = posts.users_id WHERE `blog_title` LIKE '%$blogTitle%' AND `blog_post` LIKE '%$blogText%'";
    $result = mysqli_query($conn, $sql_statement);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='search'>";
            //echo "recipe id: " . $row["id"] . "<br>";
            echo "<h2>" . $row["blog_title"] . " by " . $row['name'] . "</h2>";
            echo $row["blog_post"] . "<br><br>";
            
            echo "<h3>Comments:</h3>";
            $post_id = $row['id'];
            $sql_comments = "SELECT * FROM `comments` JOIN `users` ON users.id = comments.users_id WHERE `posts_id` = '$post_id'";
            $result_comments = mysqli_query($conn, $sql_comments);
            if ($result_comments) {
                while ($row_comments = mysqli_fetch_array($result_comments)) {
                    echo "'" . $row_comments['comment_text'] . "'" . "<br>";
                    echo "Rating: " . $row_comments['comments_rating'] . " - ";
                    echo $row_comments['name'] . "<br>";
                    echo "<br>";
                }
                
                ?>
            <form action = "processComments.php">
            <input type = "hidden" name = "id" value = "<?php echo $row['id']?>"></input>
            Comments: <textarea name= "comments" rows = "5" cols = "50"></textarea><br><br>
            Rating: <select name = "rate" >
            		<option value = "0">0</option>
            		<option value = "1">1</option>
            		<option value = "2">2</option>
            		<option value = "3">3</option>
            		<option value = "4">4</option>
            		<option value = "5">5</option>
             </select><br><br>
              
          <?php    
				$rate = 0;
				$sum = 0;
				
                $result_comments = mysqli_query($conn, $sql_comments);
                while ($row_comments = mysqli_fetch_array($result_comments)){
                $sum = $sum + $row_comments['comments_rating'];
                $rate++;
                }
                if ($rate == "0"){
                $average = "---";
                }
                else {
                $average = $sum / $rate;
                }
                echo "<h3>Average Rating: " . round($average,2) . "<br><br>";
             ?>
          
            <button type = "submit">Add Comment</button><br>
            </form>
            </div>
           
<?php      
        }
        }
    }

        
    }
        
else {
    echo "ERROR" . mysqli_connect_error();
    exit;
}

mysqli_close($conn);
?>