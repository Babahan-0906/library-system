<?php
    require_once '../init.php';

    $sql = "TRUNCATE TABLE classes";
    mysqli_query ($connection, $sql);

    $sql = "TRUNCATE TABLE teachers";
    mysqli_query ($connection, $sql);

    $sql = "TRUNCATE TABLE students";
    mysqli_query ($connection, $sql);

?>