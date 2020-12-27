<?php
  session_start();
  require 'settings.php';
?>
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Erasmus tracker</title>    
    <style>
      @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pacifico|Roboto:400,700');

      @import url('style.css');
      
      #map {
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
        z-index: 999;
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
            left: -25px;
        }

        #favorite {
            top: 66%;
            background-color: #555;
            left: 0px;
        }

      }

      #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
      }

       #legend h3 {
        margin-top: 0;
      }
      #legend img {
        vertical-align: middle;
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
    <div id="leftMenu" class="leftMenu">
      <center>
        <a href="destinations.php" id="add_destination"><i class="material-icons">add_location</i></a>
        <a href="map.php" id="map1"><i class="material-icons">map</i></a>
        <a href="list.php" id="list"><i class="material-icons">format_list_bulleted</i></a>
        <a href="fav.php" id="favorite"><i class="material-icons">star</i></a>
      </center>
    </div>
    <div id="map"></div>
    <div id="legend"><h3>Legend</h3></div>

    <script>
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
        },
        fav: {
          text: "Favorite place",
          icon: 'media/img13'
        }

      };

        function initMap() {
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
                stylers: [{color: '#92998d'}]
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
            
              var type = customLabel['fav'];
              var name = type.text;
              var icon = type.icon;
              var div = document.createElement('div');
              div.innerHTML = '<img src="' + icon + '"> ' + name;
              legend.appendChild(div);
            
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
              var favorite = markerElem.getAttribute('fav');

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              if (favorite == 1)
              {
                var icon = customLabel['fav'] || {};
                var marker = new google.maps.Marker({
                  map: map,
                  position: point,
                  icon: icon.icon
                });
              }
              else
              {
                var marker = new google.maps.Marker({
                  map: map,
                });
              }
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
    </script>

  </body>
</html>