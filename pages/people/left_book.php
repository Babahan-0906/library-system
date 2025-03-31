<?php
    require_once ('../init.php');

    $query = "SELECT book_quantity FROM books WHERE book_id='" . $_POST['book_id'] . "'";
    $query_run = mysqli_query ($connection, $query);
    
    $book_quantity = mysqli_fetch_assoc($query_run)['book_quantity'];

    $query = "SELECT book_quantity FROM borrowed_books WHERE book_id='" . $_POST['book_id'] . "'";
    $query_run = mysqli_query ($connection, $query);

    $book_borrowed = 0;
    while ($row = mysqli_fetch_assoc ($query_run))    $book_borrowed += $row['book_quantity'];

    echo $book_quantity - $book_borrowed;

?>