<?php
	require 'settings.php';
	session_start();
	session_unset();
	session_destroy(); 
?>

<!DOCTYPE html>
<html>
<head>

	<title>Erasmus Tracker</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-latest.js"></script>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pacifico|Roboto:400,700');
	</style>

	<style type="text/css">

		body {margin:0;}

		ul {
				display: none;
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		    background-color: white;
		    position: fixed;
		    top: 0;
		    width: 100%;
		    z-index: 99;
		    box-shadow: 0px 3px 5px #888888;
		}

		li {
		    float: left;
		}

		li a {
		    display: block;
		    color: #4E4E4E;
		    text-align: center;
		    padding: 1.5% 16px;
		    text-decoration: none;
		}

		#small_title_text:hover {
		    color: #5353FF;
		}

		.mobile {
			display: none;
		}

		.desktop {
			display: inline;
		}

		@media only screen
   and (min-device-width : 320px)
   and (max-device-width : 768px){

   	.mobile {
   		display: inline;
   	}
   	
   	.desktop {
   		display: none;
   	}

   	.animated_button {
   		font-family: 'Roboto', sans-serif;
		  display: inline-block;
		  border-radius: 5px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 133%;
		  padding: 2%;
		  padding-top: 1.5%;
		  padding-bottom: 1.5%;
		  width: 30%;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.scalable_image {
			width: 35%;
		}

   }

   	#section1 {
   		max-height: 40%;
   		background-image: url('media/img1.jpg');
   		background-repeat: no-repeat;
   		background-size: cover;
   		background-position: center;
   	}

   	#section2 {
   		max-height: 40%;
   	}

   	#section3 {
   		max-height: 40%;
   		background-image: url('media/img5.jpg');
   		background-repeat: no-repeat;
   		background-size: cover;
   		background-position: 50% 55%;
   	}

   	#footer {
   		max-height: 20%;
   		background-color: #DBDBDB;
   	}

   	#title {
   		font-family: 'Pacifico', sans-serif;
   		font-size: 50px;
   		color: white;
   		text-shadow: 4px 4px 4px #aaa;
   	}

   	#title2 {
   		font-family: 'Open Sans', sans-serif;
   		text-shadow: 2px 2px 2px #aaa;
   		padding-bottom: 3%;
   	}

   	#title3 {
   		font-family: 'Pacifico', sans-serif;
   		text-shadow: 2px 2px 2px #aaa;
   		padding-bottom: 3%;
   	}

   	#small_title {
   		font-family: 'Pacifico', sans-serif;
   		padding-left: 1%;
   	}

   	#small_title_text {
   		font-family: 'Open Sans', sans-serif;
   		padding-top: 0.5%;
   	}

   	#text_subtitle {
   		font-family: 'Open Sans', sans-serif;
   		color: white;
   		text-shadow: 4px 4px 4px #aaa;
   	}

   	#text {
   		font-family: 'Open Sans', sans-serif;	
   	}

   	@media only screen
   	and (min-device-width: 768px) {

   	.animated_button {
   		font-family: 'Roboto', sans-serif;
		  display: inline-block;
		  border-radius: 5px;
		  background-color: #f4511e;
		  border: none;
		  color: #FFFFFF;
		  text-align: center;
		  font-size: 133%;
		  padding: 2%;
		  padding-top: 1.5%;
		  padding-bottom: 1.5%;
		  width: 15%;
		  transition: all 0.5s;
		  cursor: pointer;
		  margin: 5px;
		}

		.animated_button span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.animated_button span:after {
		  content: '\00bb';
		  position: absolute;
		  opacity: 0;
		  top: 0;
		  right: -1.75%;
		  transition: 0.5s;
		}

		.animated_button:hover span {
		  padding-right: 21px;
		}

		.animated_button:hover span:after {
		  opacity: 1;
		  right: 0;
		}

		.scalable_image {
			width: 15%;
		}

	}

</style>

<script type="text/javascript">
(function($) {          
    $(document).ready(function(){                    
        $(window).scroll(function(){                          
            if ($(this).scrollTop() > 200) {
                $('#menu').fadeIn(500);
            } else {
                $('#menu').fadeOut(500);
            }
        });
    });
})(jQuery);
</script>

</head>
<body>


<ul id="menu">
  <li id="small_title" class="mobile"><a href="index.php"><h1>Erasmus tracker</h1></a></li>
  <li id="small_title" class="desktop"><a href="index.php"><h2>Erasmus tracker</h2></a></li>
  <li id="small_title_text" class="desktop" style="float: right"><a href="register.php"><h5>Register</h5></a></li>
  <li id="small_title_text" class="desktop" style="float: right"><a href="login.php"><h5>Login</h5></a></li>
</ul>

<div id="section1" style="padding:20px;">
	<center>
		<h1 id="title">Erasmus tracker</h1>
		<p id="text_subtitle">It's a webside made by students for students </p>
		<p id="text_subtitle">meant to help students interested in Erasmus.</p>
		<a href="login.php" style="text-decoration: none; color: white;">
			<button class="animated_button"><span>Log in</span></button>
		</a>
		<a href="register.php" style="text-decoration: none; color: white;">
			<button class="animated_button"><span>Sign up</span></button>
		</a>
		<a href="mapUnknown.php" style="text-decoration: none; color: white;">
			<button class="animated_button"><span>Access map</span></button>
		</a>

	</center>
</div>

<div id="section2" style="padding:20px; padding-bottom: 25px;">
	<center>
		<h1 id="title2">What can you do with it?</h1>
		<table align="center">
			<tr>
				<td align="center">
					<img src="media/img2.png" class="scalable_image">
				</td>
				<td align="center">
					<img src="media/img3.png" class="scalable_image">
				</td>
				<td align="center">
					<img src="media/img4.png" class="scalable_image">
				</td>
			</tr>
			<tr>
				<td align="center">
					<p id="text">You can pin to the map universities</p>
					<p id="text">that you have been to as an Erasmus student</p>
				</td>
				<td align="center" style="width: 33%">
					<p id="text">You can create a list with the universities</p>
					<p id="text">you've visited as an Erasmus student</p>
				</td>
				<td align="center">
					<p id="text">You can see information about</p>
					<p id="text">univeristies that can accept you as an Erasmus student</p>
				</td>
			</tr>
		</table>
	</center>
</div>

<div id="section3" style="padding:20px;">
	<center>
		<h1 id="title3">Who is it for?</h1>
		<p id="text_subtitle"><b>This website is for everybody</b></p>
		<p id="text_subtitle">It doesn't matter if you want to take part in an Erasmus</p>
		<p id="text_subtitle">exchange, if you have already been to one or you are just curious.</p>
	</center>
</div>

 <div id="footer" style="padding:20px; position: inherit; bottom: 0; width: auto;">
			<p id="text_subtitle"><b>Erasmus Tracker &#9400; 2020</b></p>
		</div>

</body>
</html>