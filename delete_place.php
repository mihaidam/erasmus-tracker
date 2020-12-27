<?php
    
    require 'settings.php';

    $sql = "INSERT INTO markers WHERE id='".$city["id"]."' (fav) VALUES (1)";

    if ( $mysqli->query($sql) ){
        header("location: destinations.php");
    }

    else {
        $_SESSION['message'] = 'Error!';
        header("location: error.php");
    }

?>
