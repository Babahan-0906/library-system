<?php
    require_once ('../init.php');

    $ti = $_POST['teacher_id'];

    $sql = "UPDATE teachers SET teacher_exist='true' WHERE teacher_id='$ti'";
    mysqli_query ($connection, $sql);

    echo $sql;

?>