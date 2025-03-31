<?php
    ob_start();
    require_once("hidden.php");
    // require_once("function.php");
    $connection = @mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    if(!$connection)
    {
        echo "connection failed";
    }
    
?>