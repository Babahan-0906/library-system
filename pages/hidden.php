<?php

    if(!defined('DB_SERVER'))
    {
        define('DB_SERVER', 'localhost');
    }
    
    if(!defined('DB_USER'))
    {
        define('DB_USER', 'root');
    }
    
    if(!defined('DB_PASSWORD'))
    {
        define('DB_PASSWORD', '');
    }
    
    if(!defined('DB_NAME'))
    {
        define('DB_NAME', 'library');
    }
    
    if(!defined('DB_PORT'))
    {
        define('DB_PORT', '3306');
    }
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

?>

<?php
/*
    if(!defined('DB_SERVER'))
    {
        define('DB_SERVER', 'sql106.infinityfree.com');
    }
    
    if(!defined('DB_USER'))
    {
        define('DB_USER', 'if0_34595977');
    }
    
    if(!defined('DB_PASSWORD'))
    {
        define('DB_PASSWORD', 'wI3F0Ix9bni');
    }
    
    if(!defined('DB_NAME'))
    {
        define('DB_NAME', 'if0_34595977_library');
    }
    
    if(!defined('DB_PORT'))
    {
        define('DB_PORT', '3306');
    }
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
*/
?>