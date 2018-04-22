<?php
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';

echo "<h1>Comments Administration</h1>";
if ($_SESSION['role'] != 'admin') {
    echo "Please login as an admin<br>";
    exit;
}
?>
<body>
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
if ($conn) {
    
    
    $sql_statement = "SELECT * FROM `users`";
    
    $result = mysqli_query($conn, $sql_statement);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='search'>";
            echo "User ID " . $row["id"] . " - ";
            $user_id = $row['id'];
            echo $row["name"] . "<br>";
            
            echo "===============<br>";
            
            $sql_statement2 = "SELECT *, comments.id AS comment_id FROM comments JOIN users ON users.id = comments.users_id WHERE users.id = '$user_id'";
            $result2 = mysqli_query($conn, $sql_statement2);
            if ($result2) {
                echo "<div class= 'search'>";
                while($row2 = mysqli_fetch_assoc($result2)){
                    echo "comment id " . $row2['comment_id'] . " --- ";
                    echo $row2['comment_text'] . "<br>";
                    //echo "<hr>";
                    ?>
                    <form action = "showEditComment.php">
                    <input type="hidden" name = "comment_id" value = "<?php echo $row2['comment_id']?>"></input>
                    <button type = "submit">Edit</button>
                    </form>
                    <form action = "processDeleteComment.php">
                    <input type="hidden" name = "comment_id" value = "<?php echo $row2['comment_id']?>"></input>
                    <button type = "submit">Delete</button>
                    </form>
                <?php 
              
            }
            echo "</div>";
        }
    }
  }
    else {
        echo "There was a problem " . mysqli_error($conn);
    }
        }
else {
    echo "ERROR" . mysqli_connect_error();
   
}
mysqli_close($conn);
?>
</body>