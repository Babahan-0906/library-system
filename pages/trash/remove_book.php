<?php
    require_once ('../init.php');

    $bi = $_POST['book_id'];

    $sql = "DELETE FROM  books WHERE book_id='$bi'";
    mysqli_query ($connection, $sql);

    echo $sql;

?>