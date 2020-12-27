<?php
	require 'settings.php';
	session_start();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
      if (isset($_POST['city'])) {
          require 'destinations_code.php';
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

    #map {
        height: 100%;
        visibility: hidden;
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
          left: 0;
      }

      #add_destination {
            top: 39%;
            background-color: #4CAF50;
            left: 0px;
        }

        @media only screen
     and (min-device-width : 320px)
     and (max-device-width : 768px){

        #add_destination {
            top: 37%;
            background-color: #4CAF50;
            left: -20px;
        }

        #map1 {
            top: 48%;
            background-color: #2196F3;
            left: -35px;
        }

        #list {
            top: 59%;
            background-color: #f44336;
            left: -35px;
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
            left: 0px;
        }

        #map1 {
            top: 48%;
            background-color: #2196F3;
            left: -25px;
        }

        #list {
            top: 57%;
            background-color: #f44336;
            left: -25px;
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
	</style>

      
</head>

<body>

	<ul id="menu">
	  <li id="small_title" class="mobile"><a href="index.php"><h1>Erasmus tracker</h1></a></li>
	  <li id="small_title" class="desktop"><a href="index.php"><h2>Erasmus tracker</h2></a></li>
    <li id="small_title_text" class="desktop" style="float: right"><a href="logout.php"><h5>Logout</h5></a></li>
	  <li id="small_title_text" class="desktop" style="float: right"><a><h5>Hello, <?php echo($_SESSION['first_name']." ".$_SESSION['last_name']); ?>!</h5></a></li>	  
	</ul>

	<div id="section1" style="background-image: url('media/img7.jpg');">
    
    <div id="leftMenu" class="leftMenu">
      <center>
        <a href="destinations.php" id="add_destination"><i class="material-icons">add_location</i></a>
        <a href="map.php" id="map1"><i class="material-icons">map</i></a>
        <a href="list.php" id="list"><i class="material-icons">format_list_bulleted</i></a>
        <!-- <a href="fav.php" id="favorite"><i class="material-icons">star</i></a> -->
      </center>
    </div>

		<center>
		<h1 id="title">Add a new destination</h1>
		<p id="text_subtitle">Just search for the place you want to add to your map</p>
		 

    <form action="destinations.php" method="post" id="add_place">
    <table id="address">
      <tr>
        <td>
          <label id="small_title" for="autocomplete" style="text-shadow: 2px 2px 2px #aaa;">Place name</label>
        </td>
        <td>
          <input id="autocomplete" name="place_name" placeholder="Name of the place" type="text"></input>
        </td>
      </tr>
      <tr>
        <td>
          <label id="small_title" for="type" style="text-shadow: 2px 2px 2px #aaa;">Type</label>
        </td>
        <td>
          <select id="select_type" name="types" style="width: 100%" form="add_place">
            <option value="t">Info</option>
            <option value="w">Review</option>
          </select>
        </td>
      </tr>
       <!-- <tr>
        <td>
          <label id="small_title" for="fav" style="text-shadow: 2px 2px 2px #aaa;">Favorite</label>
        </td>
        <td>
          <input id="fav" name="favorite" type="checkbox"><br>
        </td>
      </tr> -->
      <tr>
        <td>
          <label id="small_title" for="locality" style="text-shadow: 2px 2px 2px #aaa;">Text</label>
        </td>
        <td>
          <input id="locality" name="review" type="text" ></input>
        </td>
      </tr>
      <!-- <tr>
        <td>
          <label id="small_title" for="administrative_area_level_1" style="text-shadow: 2px 2px 2px #aaa;">State</label>
        </td>
        <td>
          <input id="administrative_area_level_1" type="text"  ></input>
        </td>
      </tr>
      <tr>
        <td>
          <label id="small_title" for="country" style="text-shadow: 2px 2px 2px #aaa;">Country</label>
        </td>
        <td>
          <input id="country" type="text"  ></input>
        </td>
      </tr>
      <tr>
        <td>
          <label id="small_title" for="latitude" style="text-shadow: 2px 2px 2px #aaa;">Latitude</label>
        </td>
        <td>
          <input id="latitude" type="text"  name="latitude" ></input>
        </td>
      </tr>
      <tr>
        <td>
          <label id="small_title" for="longitude" style="text-shadow: 2px 2px 2px #aaa;">Longitude</label>
        </td>
        <td>
          <input id="longitude" type="text"  name="longitude" ></input>
        </td>
      </tr> -->
    </table>

    <button class="animated_button" type="submit" name="city" ><span>Add</span></button>

    </form>

    <div id="map"></div>
    </center>
    </div>

 <!--    <script type="text/javascript">

     // var location = document.getElementById("autocomplete");
//       console.log(location);

    var inputBox = document.getElementById('autocomplete');

inputBox.onkeyup = function(){


  var val = inputBox.value;
  console.log(val);



  // Creating a cookie after the document is ready 
  // $(document).ready(function () {
  createCookie("input", val, 1);
//window.location.reload(false); // });

   
// Function to create the cookie 
function createCookie(name, value, days) { 
    // var expires; 
      
    if (days) { 
        var date = new Date(); 
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
        expires = "; expires=" + date.toGMTString(); 
    } 
    else { 
        expires = ""; 
    } 
      
    document.cookie = escape(name) + "=" +  
        escape(value) + expires + "; path=/"; 
}


    



  // <?php

  //   echo "console.log('".$_COOKIE["input"]."');";

  //   $in = strval($_COOKIE["input"]);
  //   // echo "<script>document.writeln(val);</script>";

  //   //     $curlSession = curl_init();
  //   // curl_setopt($curlSession, CURLOPT_URL, 'photon.komoot.io/api/?q=berlin&limit=1');
  //   // curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
  //   // curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

  //   // $jsonData = json_decode(curl_exec($curlSession));
  //   // curl_close($curlSession);

  //   // echo "console.log('".$jsonData->{'type'}."');";


  //     $ch = curl_init();
  //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //     // curl_setopt($ch, CURLOPT_URL, "https://api.opencagedata.com/geocode/v1/json?q=".$_COOKIE['input']."&key=a453b90779f44e19a2d6df50ed915ed1");

  //     $url = "https://api.opencagedata.com/geocode/v1/json?q=".$in."&key=a453b90779f44e19a2d6df50ed915ed1";
  //     echo "console.log('".$url."');";

  //     curl_setopt($ch, CURLOPT_URL, $url);
  //     $result = curl_exec($ch);
  //     curl_close($ch);

  //     $obj = json_decode($result);
  //     // echo "console.log('".$obj->results[0]->geometry->lat."');";

  //       ?>


        // createCookie("input", "", "");  
}

    
    </script> -->


   <!--  <script>
      var placeSearch, autocomplete, geocoder;
      var componentForm = {
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
      };

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -34.397, lng: 150.644}
        });
        geocoder = new google.maps.Geocoder();
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            console.log(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        initMap();
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function geocodeAddress(geocoder) {
        var address = document.getElementById('locality').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            document.getElementById('latitude').value = results[0].geometry.location.lat();
            document.getElementById('longitude').value = results[0].geometry.location.lng();
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }

        document.getElementById('locality').disabled = true;
        document.getElementById('administrative_area_level_1').disabled = true;
        document.getElementById('country').disabled = true;
        document.getElementById('latitude').disabled = false;
        document.getElementById('longitude').disabled = false;
        geocodeAddress(geocoder, map);
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnmVmGsC8x6aC4VoJMg7CiiHQa-26wtjY&libraries=places&callback=initAutocomplete"
        async defer></script> -->

     <div id="footer" style="padding:20px; position: inherit; bottom: 0; width: auto;">
      <p id="text_subtitle"><b>Erasmus Tracker &#9400; 2020</b></p>
    </div>

</body>

</html>