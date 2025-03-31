<?php
    require_once ('../init.php');

    $si = $_POST['student_id'];

    $sql = "UPDATE students SET student_exist='true' WHERE student_id='$si'";
    mysqli_query ($connection, $sql);

    echo $sql;

?>