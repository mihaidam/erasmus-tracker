<?php
  session_start();
  require 'settings.php';
?>
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"/>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <script src="./Leaflet.markercluster-1.4.1/dist/leaflet.markercluster.js" crossorigin=""></script>
   <link rel="stylesheet" href="./Leaflet.markercluster-1.4.1/dist/MarkerCluster.css" />
	<link rel="stylesheet" href="./Leaflet.markercluster-1.4.1/dist/MarkerCluster.Default.css" />
	<script src="./Leaflet.markercluster-1.4.1/dist/leaflet.markercluster-src.js"></script>
    <title>Erasmus tracker</title>    
    <style>
      @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pacifico|Roboto:400,700');

      @import url('style.css');
      
      #mapid {
        height: 90%;
        top: 10%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
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

      @media only screen
     and (min-device-width : 320px)
     and (max-device-width : 768px)
     and (orientation: portrait){

        #add_destination {
            top: 37%;
            background-color: #4CAF50;
            left: -35px;
        }

        #map1 {
            top: 48%;
            background-color: #2196F3;
            left: -20px;
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

      #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
        right: -150px;
      }

      }

      @media only screen
     and (min-device-width : 320px)
     and (max-device-width : 768px)
     and (orientation: landscape){

        #menu {
          visibility: hidden;
        }

        #map1 {
          height: 110%;
          top: 0px;
        }

        #add_destination {
            top: 37%;
            background-color: #4CAF50;
            left: -35px;
        }

        #map1 {
            top: 48%;
            background-color: #2196F3;
            left: -20px;
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

      #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
        right: -150px;
      }

      }


       #legend h3 {
        margin-top: 0;
      }
      #legend img {
        vertical-align: middle;
      }

      /*.custom-popup .leaflet-popup-content-wrapper {
      background:#2c3e50;
      color:#fff;
      font-size:16px;
      line-height:24px;
      }
    .custom-popup .leaflet-popup-content-wrapper a {
      color:rgba(255,255,255,0.5);
      }
    .custom-popup .leaflet-popup-tip-container {
      width:30px;
      height:15px;
      }
    .custom-popup .leaflet-popup-tip {
      border-left:15px solid transparent;
      border-right:15px solid transparent;
      border-top:15px solid #2c3e50;
      }*/

    </style>
  </head>

  <body>
  <ul id="menu">
    <li id="small_title" class="mobile"><a href="destinations.php"><h1>Erasmus tracker</h1></a></li>
    <li id="small_title" class="desktop"><a href="destinations.php"><h2>Erasmus tracker</h2></a></li>
    <li id="small_title_text" class="desktop" style="float: right"><a href="logout.php"><h5>Logout</h5></a></li>
    <li id="small_title_text" class="desktop" style="float: right"><a><h5>Hello, <?php echo($_SESSION['first_name']." ".$_SESSION['last_name']); ?>!</h5></a></li>
  </ul>
    <div id="leftMenu" class="leftMenu">
      <center>
        <a href="destinations.php" id="add_destination"><i class="material-icons">add_location</i></a>
        <a href="map.php" id="map1"><i class="material-icons">map</i></a>
        <a href="list.php" id="list"><i class="material-icons">format_list_bulleted</i></a>
        <!-- <a href="fav.php" id="favorite"><i class="material-icons">star</i></a> -->
      </center>
    </div>
    <div id="mapid"></div>
    <!-- <div id="legend"><h3>Legend</h3></div> -->

    <script type="text/javascript">
      var mymap = L.map('mapid').setView([45.7478513, 21.2319454], 13);
      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiZGFtaWFuMDAiLCJhIjoiY2todDdlemNhMHJmdzJybGhydXg5aTd3dSJ9.2JIcaaVIJIIDaSNkqSMQzA'
      }).addTo(mymap);
	  
	  var myIcon = L.icon({
		iconUrl: './media/info.png',
		iconSize: [38, 38],
		//iconAnchor: [22, 94],
		//popupAnchor: [-3, -76],
	});


      // var marker = L.marker([45.82, 22.07]).addTo(mymap);

      // marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

      // var popup = L.popup()
      // .setLatLng([51.5, -0.09])
      // .setContent("I am a standalone popup.")
      // .openOn(mymap);


      var lat = [];
      <?php
            $sql = "SELECT id, name, type, lat, lng FROM markers";// WHERE authors='".$_SESSION['email']."' ";
            if ($mysqli->query($sql)){
              $names = $mysqli->query($sql);
              if ($names->num_rows > 0){
                
                while ($city = $names->fetch_assoc()){
                  $_SESSION['id2'] = $city["id"];
                  echo "lat.push(".$city["lat"].");";
                }
              
              }
              
            }

          ?>

      var lng = [];
      <?php
            $sql = "SELECT id, name, type, lat, lng FROM markers";// WHERE authors='".$_SESSION['email']."' ";
            if ($mysqli->query($sql)){
              $names = $mysqli->query($sql);
              if ($names->num_rows > 0){
                
                while ($city = $names->fetch_assoc()){
                  $_SESSION['id2'] = $city["id"];
                  echo "lng.push(".$city["lng"].");";
                }
              
              }
              
            }

          ?>


      var desc = [];
      <?php
            $sql = "SELECT id, name, address, type, lat, lng FROM markers";// WHERE authors='".$_SESSION['email']."' ";
            if ($mysqli->query($sql)){
              $names = $mysqli->query($sql);
              if ($names->num_rows > 0){
                
                while ($city = $names->fetch_assoc()){
                  $_SESSION['id2'] = $city["id"];
                  echo "desc.push('".$city['address']."');";
                }
              
              }
              
            }

          ?>
		  
	  var tip = [];
	  <?php
            $sql = "SELECT id, name, address, type, lat, lng FROM markers";// WHERE authors='".$_SESSION['email']."' ";
            if ($mysqli->query($sql)){
              $names = $mysqli->query($sql);
              if ($names->num_rows > 0){
                
                while ($city = $names->fetch_assoc()){
                  $_SESSION['id2'] = $city["id"];
                  echo "tip.push('".$city['type']."');";
                }
              
              }
              
            }

          ?>


      var cont = 0;
	  var markers = L.markerClusterGroup();
      while (cont < lat.length)
      {
		if (tip[cont] != 'w'){
			var marker = L.marker([lat[cont], lng[cont]], {icon: myIcon});
		}
		else {
			var marker = L.marker([lat[cont], lng[cont]]);
		}

        marker.bindPopup(String(desc[cont]));
		
		markers.addLayer(marker);

        // var popup = L.popup()
        // .setLatLng([lat[cont], lng[cont]])
        // .setContent("test")
        // .openOn(mymap);

        cont ++;
      }
	  
	  mymap.addLayer(markers);


    </script>

    <!-- <script>
      var customLabel = {
        v: {
          text: "I've been here",
          label: 'V',
          icon: 'media/img9.png'
        },
        t: {
          text: "I've only transited through here",
          label: 'T',
          icon: 'media/img10.png'
        },
        w: {
          text: "I want to go here",
          label: 'W',
          icon: 'media/img11'
        }

      };

        function initMap() {

        	var styledMapType = new google.maps.StyledMapType(
            {name: 'Styled Map'});

        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(46.169604, 21.768658),
          zoom: 3,
          styles: [
              {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
              {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
              {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
              {
                featureType: 'administrative',
                elementType: 'geometry.stroke',
                stylers: [{color: '#91740b'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'geometry.stroke',
                stylers: [{color: '#dcd2be'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'labels.text.fill',
                stylers: [{color: '#ae9e90'}]
              },
              {
                featureType: 'landscape.natural',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#93817c'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'geometry.fill',
                stylers: [{color: '#5b7213'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#759907'}]
              },
              {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#f5f1e6'}]
              },
              {
                featureType: 'road.arterial',
                elementType: 'geometry',
                stylers: [{color: '#604e03'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#e03b00'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#f8c967'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry',
                stylers: [{color: '#e03b00'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry.stroke',
                stylers: [{color: '#db8555'}]
              },
              {
                featureType: 'road.local',
                elementType: 'labels.text.fill',
                stylers: [{color: '#806b63'}]
              },
              {
                featureType: 'water',
                elementType: 'geometry.fill',
                stylers: [{color: '#00b6f9'}]
              },
              {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#00b6f9'}]
              }
            ]
        });

        map.setOptions({ minZoom: 2, maxZoom: 9 });
        var infoWindow = new google.maps.InfoWindow;

        var data = <?php echo json_encode($_SESSION['email'], JSON_HEX_TAG); ?>;
        data+=".xml";

        downloadUrl(data, function(data) {
          map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('legend'));
          var legend = document.getElementById('legend');
          for (var key in customLabel) {
            var type = customLabel[key];
            var name = type.text;
            var icon = type.icon;
            var div = document.createElement('div');
            div.innerHTML = '<img src="' + icon + '"> ' + name;
            legend.appendChild(div);
          }
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName('marker');
          Array.prototype.forEach.call(markers, function(markerElem) {
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              icon: icon.icon
            });
            marker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });
          });
        });
      }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAH3qp60SlYdYpS8G390kZdd8Lwo7c4GvQ&callback=initMap">
    </script> -->

  </body>
</html>