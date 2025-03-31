<?php
    require_once ('../init.php');

    $si = $_POST['student_id'];

    $sql = "DELETE FROM students WHERE student_id='$si'";
    mysqli_query ($connection, $sql);

    echo $sql;

?>