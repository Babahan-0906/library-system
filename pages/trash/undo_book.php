<?php
    require_once ('../init.php');

    $bi = $_POST['book_id'];

    $sql = "UPDATE books SET book_exist='true' WHERE book_id='$bi'";
    mysqli_query ($connection, $sql);

    echo $sql;

?>