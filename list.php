<?php
	require 'settings.php';
	session_start();

  error_reporting(E_ERROR);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
    $sql1 = "SELECT id, name, type FROM markers WHERE authors='".$_SESSION['email']."'";
            if ($mysqli->query($sql1)){
              $names = $mysqli->query($sql1);
              if ($names->num_rows > 0){
                while ($city = $names->fetch_assoc()){
                  if (isset($_POST[$city["id"]])) {
                      $sql = "DELETE FROM markers WHERE id='".$city["id"]."'";

                  if ( $mysqli->query($sql) ){
                      // include 'map_code.php';
                      header("location: map.php");
                  }

                  else {
                      $_SESSION['message'] = 'Error!';
                      header("location: error3.php");
                  }
                  }
              }
            }
          }

          if (isset($_POST['favorite']))
          {
            $sql = "UPDATE markers SET fav=1 WHERE id='".$_SESSION["id"]."'";

            if ( $mysqli->query($sql) ){
                include 'map_code.php';
                header("location: fav.php");
            }

            else {
                $_SESSION['message'] = 'Error!';
                header("location: error3.php");
            }
          }

          if (isset($_POST['favorite1']))
          {
            $sql = "UPDATE markers SET fav=1 WHERE id='".$_SESSION["id1"]."'";

            if ( $mysqli->query($sql) ){
                include 'map_code.php';
                header("location: fav.php");
            }

            else {
                $_SESSION['message'] = 'Error!';
                header("location: error3.php");
            }
          }

          if (isset($_POST['favorite2']))
          {
            $sql = "UPDATE markers SET fav=1 WHERE id='".$_SESSION["id2"]."'";

            if ( $mysqli->query($sql) ){
                include 'map_code.php';
                header("location: fav.php");
            }

            else {
                $_SESSION['message'] = 'Error!';
                header("location: error3.php");
            }
          }

   }
?>
<!DOCTYPE html>
<html>

<head>
	<title>Erasmus Tracker</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pacifico|Roboto:400,700');

		@import url('style.css');

      #leftMenu a {
        position: fixed;
        transition: 0.3s;
        padding: 15px;
        width: 50px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        border-radius: 0 5px 5px 0;
      }

      #leftMenu a:hover {
          left: 0;
      }

        @media only screen
     and (min-device-width : 320px)
     and (max-device-width : 768px){

        #add_destination {
            top: 37%;
            background-color: #4CAF50;
            left: -35px;
        }

        #map1 {
            top: 48%;
            background-color: #2196F3;
            left: -35px;
        }

        #list {
            top: 59%;
            background-color: #f44336;
            left: -25px;
        }

        #favorite {
            top: 70%;
            background-color: #555;
            left: -35px;
        }
        #leftMenu a {
        position: fixed;
        transition: 0.3s;
        padding: 15px;
        width: 50px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        border-radius: 0 5px 5px 0;
      }

        #leftMenu a:hover {
          left: -10px;
      }
      }

      @media only screen
      and (min-device-width: 768px) {

        #add_destination {
            top: 39%;
            background-color: #4CAF50;
            left: -25px;
        }

        #map1 {
            top: 48%;
            background-color: #2196F3;
            left: -25px;
        }

        #list {
            top: 57%;
            background-color: #f44336;
            left: 0px;
        }

        #favorite {
            top: 66%;
            background-color: #555;
            left: -25px;
        }

      }

      #select_type {
        padding: 12px;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
      }

      table.list {
        background-color: white;
        border-radius: 15px 15px 15px 15px;
      }

      tr.list:hover{
        background-color: #EEEEEE;
      }

      td.list {
        padding: 5px;
        font-family: 'Roboto', sans-serif;
      }

      th.list {
        font-family: 'Open Sans', sans-serif;
      }

      .animated_button_small {
      font-family: 'Roboto', sans-serif;
      display: inline-block;
      border-radius: 5px;
      background-color: #f4511e;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 100%;
      padding: 2%;
      padding-top: 1.5%;
      padding-bottom: 1.5%;
      width: 100%;
      cursor: pointer;
      margin: 5px;
    }
	</style>

      
</head>

<body>

	<ul id="menu">
	  <li id="small_title" class="mobile"><a href="index.php"><h1>Erasmus tracker</h1></a></li>
	  <li id="small_title" class="desktop"><a href="index.php"><h2>Erasmus tracker</h2></a></li>
	  <li id="small_title_text" class="desktop" style="float: right"><a href="logout.php"><h5>Logout</h5></a></li>
    <li id="small_title_text" class="desktop" style="float: right"><a><h5>Hello, <?php echo($_SESSION['first_name']." ".$_SESSION['last_name']); ?>!</h5></a></li>
	</ul>

	<div id="section1" style="background-image: url('media/img8.jpg');">
    
    <div id="leftMenu" class="leftMenu">
      <center>
        <a href="destinations.php" id="add_destination"><i class="material-icons">add_location</i></a>
        <a href="map.php" id="map1"><i class="material-icons">map</i></a>
        <a href="list.php" id="list"><i class="material-icons">format_list_bulleted</i></a>
        <!-- <a href="fav.php" id="favorite"><i class="material-icons">star</i></a> -->
      </center>
    </div>

		<center>
		<h1 id="title">A list of your places</h1>
		<p id="text_subtitle" style="color: white; font-family: 'Pacifico', sans-serif;font-size: 25px;">These are all of the places you have saved</p>

    <table>
      <tr>
        <td>
          <?php
            $sql = "SELECT id, name, type FROM markers WHERE authors='".$_SESSION['email']."' AND type='v' ";
            if ($mysqli->query($sql)){
              $names = $mysqli->query($sql);
              if ($names->num_rows > 0){
                echo "<table class='list' style='width: 100%'><tr class='list'><th class='list'>Name of the place</th><th class='list'>Type of place</th><th class='list'>Actions</th></tr>";
                while ($city = $names->fetch_assoc()){
                  $_SESSION['id2'] = $city["id"];
                  echo "<tr class='list'><td class='list'>".$city["name"]."</td><td class='list'>Visited</td><td align='center' class='list'><form action='' method='post' id='".$city["id"]."'><button class='animated_button_small' type='favorite2'  name='favorite2'>Favorite</button><button class='animated_button_small' type='".$city["id"]."'  name='".$city["id"]."'>Delete</button></form></td></tr>";
                  
                }
                echo "</table>";
              }
              
            }

          ?>

        </td>
      </tr>
      <tr>
        <td>
          <?php
            $sql = "SELECT id, name, type FROM markers WHERE authors='".$_SESSION['email']."' AND type='t' ";
            if ($mysqli->query($sql)){
              $names = $mysqli->query($sql);
              if ($names->num_rows > 0){
                echo "<table class='list' style='width: 100%'><tr class='list'><th class='list'>Name of the place</th><th class='list'>Type of marker</th><th class='list'>Actions</th></tr>";
                while ($city = $names->fetch_assoc()){
                  $_SESSION['id1'] = $city["id"];
                  if ($city["type"] == "t") echo "<tr class='list'><td class='list'>".$city["name"]."</td><td class='list'>Information</td><td class='list'><form action='' method='post' id='".$city["id"]."'><button class='animated_button_small' type='".$city["id"]."'  name='".$city["id"]."'>Delete</button></form></td></tr>";
                  
                }
                echo "</table>";
              }
              
            }

          ?>
        </td>
      </tr>
      <tr>
        <td>
          <?php
            $sql = "SELECT id, name, type FROM markers WHERE authors='".$_SESSION['email']."' AND type='w' ";
            if ($mysqli->query($sql)){
              $names = $mysqli->query($sql);
              if ($names->num_rows > 0){
                echo "<table class='list' style='width: 100%'><tr class='list'><th class='list'>Name of the place</th><th class='list'>Type of marker</th><th class='list'>Actions</th></tr>";
                while ($city = $names->fetch_assoc()){
                  $_SESSION['id'] = $city["id"];
                  if ($city["type"] == "w") echo "<tr class='list'><td class='list'>".$city["name"]."</td><td class='list'>Review</td><td class='list'><form action='' method='post' id='".$city["id"]."'><button class='animated_button_small' type='".$city["id"]."'  name='".$city["id"]."'>Delete</button><br></form></td></tr>";
                }
                echo "</table>";
              }
              else{
                echo "<h3 id='text_subtitle' style='color: white; font-family: 'Pacifico', sans-serif;font-size: 25px;'>You have no saved places</h3>";
              }
            }

          ?>   
        </td>
      </tr>
    </table>

    <a href="destinations.php"><button class="animated_button" type="submit" name="city"><span>Add a place</span></button></a>

    </center>
    </div>

     <div id="footer" style="padding:20px; position: inherit; bottom: 0; width: auto;">
      <p id="text_subtitle"><b>Erasmus Tracker &#9400; 2020</b></p>
    </div>

</body>

</html>