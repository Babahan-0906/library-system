<?php
    require_once '../init.php';

    // --------------------Get book_id and book_quantity From borrowed_books------------------------
    $bi = $_POST['borrow_id'];
    $query = "SELECT book_id, book_quantity FROM borrowed_books WHERE borrow_id='$bi'";
    $query_run = mysqli_query ($connection, $query);

    $query_row = mysqli_fetch_assoc ($query_run);
    $book_id = $query_row['book_id'];
    $book_quantity = $query_row['book_quantity'];

    // -------------------Get book_quantity From books--------------------
    $sql = "SELECT book_quantity FROM books WHERE book_id='$book_id'";
    $old_book_quan = mysqli_fetch_assoc (mysqli_query ($connection, $sql))['book_quantity'];
    $old_book_quan -= $book_quantity;

    // ---------------------Check if it has in returned_books----------------------
    $sql = "SELECT * FROM returned_books WHERE borrow_id='$bi'";    
    if (mysqli_num_rows (mysqli_query ($connection, $sql)) > 0)
    {
        $sql = "UPDATE borrowed_books SET book_quantity=0 WHERE borrow_id='$bi'";
        mysqli_query ($connection, $sql);
    }
    else
    {
        $sql = "DELETE FROM borrowed_books WHERE borrow_id='$bi'";
        mysqli_query ($connection, $sql);
    }

    // ----------------------Update book_quantity From books-------------------------
    $sql = "UPDATE books SET book_quantity='$old_book_quan' WHERE book_id='$book_id'";
    mysqli_query ($connection, $sql);


    echo 'deleted';

?>