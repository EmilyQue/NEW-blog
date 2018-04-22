<?php 
session_start();
require_once 'showMenu.php';
require_once 'connector_blog.php';
?>
<title>Search Blog</title>
 <div class="search">
<style>
.search{
	background-image: linear-gradient(rgba(20,20,20,0.3),rgba(20,20,20,0.3)), url(IMG_1197.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
	}
h2, p, form{
    font-family: 'Paprika', serif;
        color: white;
	font-size: 50px;
	text-align: center;
	padding:10px;
}




</style>
<div class="box">
<h2>Search for a post</h2>
<p>Fill out any of these fields and search</p>
<form action="processSearch.php">
Blog title:<input type="text" name="blogName"></input><br>
Blog post:<input type="text" name="blogComment"></input><br>
<button type="submit">Search</button>
</form>
</div>
</div>