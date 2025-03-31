<?php
    require_once ('../init.php');

    $ti = $_POST['teacher_id'];

    $sql = "DELETE FROM teachers WHERE teacher_id='$ti'";
    mysqli_query ($connection, $sql);

    echo $sql;

?>