<?php
    require_once '../init.php';
    // echo 'im here';
    $rd = $_POST['return_date'];
    $bi = $_POST['borrow_id'];
    $bq = $_POST['book_quantity'];
    $bb = $_POST['borrowed_book_quantity'];

    $query = "INSERT INTO returned_books SET borrow_id='$bi', return_date='$rd', book_quantity='$bq'";
    mysqli_query ($connection, $query);

    $mi = $bb - $bq;
    $query = "UPDATE borrowed_books SET book_quantity='$mi' WHERE borrow_id='$bi'";
    mysqli_query ($connection, $query);

?>