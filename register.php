<?php
	require 'settings.php';
	session_start();

	if ($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
	    if (isset($_POST['register'])) {
	        require 'register_code.php';
	    }
	 }
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
  <li id="small_title" class="mobile"><a href ="index.php"><h1>Erasmus tracker</h1></a></li>
  <li id="small_title" class="desktop"><a href="index.php"><h2>Erasmus tracker</h2></a></li>
  <li id="small_title_text" class="desktop" style="float: right"><a href="register.php"><h5>Register</h5></a></li>
  <li id="small_title_text" class="desktop" style="float: right"><a href="login.php"><h5>Login</h5></a></li>
</ul>

<div id="section1" style="background-image: url('media/img6.jpg');">
	<center>
		<h1 id="title">Register</h1>
		<p id="text_subtitle">Signing up for this website is fast and simple, just enter your data bellow</p>

		<form action="register.php" method="post" autocomplete="off">
			<table>
				<tr>
					<td>
						<label id="small_title" for="f_name" style="text-shadow: 4px 4px 4px #aaa;">First Name</label>
					</td>
					<td>
						<input type="text" required autocomplete="off" name='firstname' placeholder="Your first name...">
					</td>
				</tr>

				<tr>
					<td>
						<label id="small_title" for="l_name" style="text-shadow: 4px 4px 4px #aaa;">Last Name</label>
					</td>
					<td>
						<input type="text" required autocomplete="off" name='lastname' placeholder="Your last name...">
					</td>
				</tr>

				<tr>
					<td>
						<label id="small_title" for="email" style="text-shadow: 4px 4px 4px #aaa;">Email</label>
					</td>
					<td>
						<input type="text" required autocomplete="off" name='email' placeholder="Your email...">
					</td>
				</tr>

				<tr>
					<td>
						<label id="small_title" for="password" style="text-shadow: 4px 4px 4px #aaa;">Password</label>
					</td>
					<td>
						<input type="password" required autocomplete="off" name='password' placeholder="Your password..." style="padding: 12px;
   		border-radius: 4px;
   		box-sizing: border-box;
   		margin-top: 6px;
   		margin-bottom: 16px;">
					</td>
				</tr>

			</table>

			<button class="animated_button" type="submit" name="register"><span>Sign up</span></button>

		</form>

	</center>
</div>

 <div id="footer" style="padding:20px; position: inherit; bottom: 0; width: auto;">
			<p id="text_subtitle"><b>Erasmus Tracker &#9400; 2020</b></p>
		</div>

</body>
</html>