<?php

session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Erasmus Tracker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pacifico|Roboto:400,700');

		@import url('style.css');
	</style>
</head>

<body>
    <ul id="menu">
		  <li id="small_title" class="mobile"><a href="index.php"><h1>Erasmus tracker</h1></a></li>
		  <li id="small_title" class="desktop"><a href="index.php"><h2>Erasmus tracker</h2></a></li>
	    <li id="small_title_text" class="desktop" style="float: right"><a href="register.php"><h5>Register</h5></a></li>
  		<li id="small_title_text" class="desktop" style="float: right"><a href="login.php"><h5>Login</h5></a></li>
		</ul>

		<div id="section1" style="background-image: url('media/img12.jpg');">
		<center>
			<h1 id="title">You've successfullly created an account</h1>
			<p id="text_subtitle">Thank you for using our service. Just use the button bellow to log in</p>
			<p id="text_subtitle">Until then, safe travels!</p>

			<a href="login.php"><button class="animated_button" type="submit" name="city"><span>Log in</span></button></a>

    </div>

    <div id="footer" style="padding:20px; position: inherit; bottom: 0; width: auto;">
			<p id="text_subtitle"><b>Erasmus Tracker &#9400; 2020</b></p>
		</div>
</body>
</html>
