<?php
    error_reporting(E_ERROR);
    require 'settings.php';

    $sql = "INSERT INTO markers WHERE id='".$_SESSION["id"]."' (fav) VALUES (1)";

    if ( $mysqli->query($sql) ){
    		include 'map_code.php';
        header("location: map.php");
    }

    else {
        $_SESSION['message'] = 'Error!';
        header("location: error3.php");
    }

?>
