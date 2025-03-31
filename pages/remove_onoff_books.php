<?php
    require_once 'init.php';
    $day = $_POST['date'];

    $que = "DELETE FROM writed_on_books WHERE writed_on_date LIKE '%-$day-%'";
    echo $que;
    mysqli_query ($connection, $que);

    $que = "DELETE FROM writed_off_books WHERE writed_off_date LIKE '%-$day-%'";
    echo $que;
    mysqli_query ($connection, $que);

    $que = "DELETE FROM books WHERE book_exist='false' AND cat_id!=7";
    echo $que;
    mysqli_query ($connection, $que);

?>