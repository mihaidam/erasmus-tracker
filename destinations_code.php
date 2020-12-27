<?php
error_reporting(E_ERROR);

if(isset($_POST['favorite']) && $_POST['favorite'] == true)
    $fav = 1;
else
    $fav = 0;


// $in = strval($_COOKIE["input"]);
$in = $mysqli->escape_string($_POST['place_name']);

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_URL, "https://api.opencagedata.com/geocode/v1/json?q=".$_COOKIE['input']."&key=a453b90779f44e19a2d6df50ed915ed1");

$url = "https://api.opencagedata.com/geocode/v1/json?q=".$in."&key=a453b90779f44e19a2d6df50ed915ed1";
// echo "console.log('".$url."');";

curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
curl_close($ch);

$obj = json_decode($result);



// $lat = $mysqli->escape_string($_POST['latitude']);
// $lng = $mysqli->escape_string($_POST['longitude']);

$lat = floatval ($obj->results[0]->geometry->lat);
$lng = floatval ($obj->results[0]->geometry->lng);

// $name = $mysqli->escape_string($_POST['place_name']);
$name = strval($in);

$email = $_SESSION['email'];
//$type = 'w';
$favorite = '0';

$type = $mysqli->escape_string($_POST['types']);
// $favorite = $mysqli->escape_string($_POST['favorite']);
$address = $mysqli->escape_string($_POST['review']);

    $sql = "INSERT INTO markers (name, address, lat, lng, type, authors) " 
            . "VALUES ('$name','$address','$lat','$lng','$type', '$email')";

    
    if ( $mysqli->query($sql) ){
        // include 'map_code.php';
        header("location: map.php");
    }

    else {
        $_SESSION['message'] = 'Error!';
        header("location: error3.php");
    }