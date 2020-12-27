<?php
	require 'settings.php';
	session_start();

?>
<!DOCTYPE html>
<html>
<head>

	<title>Erasmus Tracker</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type=""></script>

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

<div id="section1" style="background-image: url('media/img6.jpg'); background-size: fill">
	<center>
		<h1 id="title"><?php echo $_SESSION["message"] ?></h1>
		<p id="text_subtitle">Click bellow to try again</p>

			<a href="login.php"><button class="animated_button"><span>Log in</span></button></a>

		</form>

	</center>
</div>

 <div id="footer" style="padding:20px; position: inherit; bottom: 0; width: auto;">
			<p id="text_subtitle"><b>Erasmus Tracker &#9400; 2020</b></p>
		</div>

</body>
</html>