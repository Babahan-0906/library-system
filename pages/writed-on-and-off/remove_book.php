<?php
    require_once ('../init.php');

    
    $type = $_POST['type'];

    if ($type == '0')
    {
        $won_id = $_POST['book_id'];

        // ----------Get from writed_on_books---------
        $sql = "SELECT book_id, added_quantity FROM writed_on_books WHERE on_id='$won_id'";
        $row = mysqli_fetch_assoc (mysqli_query ($connection, $sql));

        // ----------Get info from books---------
        $bid = $row['book_id'];
        $sql = "SELECT cat_id, book_quantity FROM books WHERE book_id='$bid'";
        $b_row = mysqli_fetch_assoc (mysqli_query ($connection, $sql));

        // if ($b_row['cat_id'] == 2)
        // {
        //     $sql = "UPDATE books SET book_exist='true' WHERE book_id='$bid'";
        //     if (mysqli_query ($connection, $sql))   echo '1';
        // }
        // else
        // {
            $nquan = $b_row['book_quantity'] - $row['added_quantity'];
            $sql = "UPDATE books SET book_quantity='$nquan', book_exist='true' WHERE book_id='$bid'";
            if (mysqli_query ($connection, $sql))   echo '1';
        // }

        // Delete from writed_on_books
        $sql = "DELETE FROM writed_on_books WHERE on_id='$won_id'";
        if (mysqli_query ($connection, $sql))   echo '1';

    }
    else
    {
        $won_id = $_POST['book_id'];

        // ----------Get from writed_off_books---------
        $sql = "SELECT book_id, added_quantity FROM writed_off_books WHERE off_id='$won_id'";
        $row = mysqli_fetch_assoc (mysqli_query ($connection, $sql));

        // ----------Get info from books---------
        $bid = $row['book_id'];
        $sql = "SELECT cat_id, book_quantity FROM books WHERE book_id='$bid'";
        $b_row = mysqli_fetch_assoc (mysqli_query ($connection, $sql));

        if ($b_row['cat_id'] == 2)
        {
            $sql = "UPDATE books SET book_exist='true' WHERE book_id='$bid'";
            if (mysqli_query ($connection, $sql))   echo '1';

            // Get info about book
            $sql2 = "SELECT * FROM books WHERE book_id='$bid'";
            $crow = mysqli_fetch_assoc (mysqli_query ($connection, $sql2));

            // Get all similar books number
            $sql2 = "SELECT book_id FROM books WHERE book_name='" . $crow['book_name'] . "' AND book_author='" . $crow['book_author'] . "' AND book_year='" . $crow['book_year'] . "' AND book_language='" . $crow['book_language'] . "' AND student_cat='" . $crow['student_cat'] . "' AND book_edition='" . $crow['book_edition'] . "' AND CAST(book_cost AS DECIMAL(7,4))=CAST('" . $crow['book_cost'] . "' AS DECIMAL(7,4)) AND book_exist='true'";
            $bnum = mysqli_num_rows (mysqli_query ($connection, $sql2));

            // Update it
            $sql2 = "UPDATE books SET book_quantity='$bnum' WHERE book_name='" . $crow['book_name'] . "' AND book_author='" . $crow['book_author'] . "' AND book_year='" . $crow['book_year'] . "' AND book_language='" . $crow['book_language'] . "' AND student_cat='" . $crow['student_cat'] . "' AND book_edition='" . $crow['book_edition'] . "' AND CAST(book_cost AS DECIMAL(7,4))=CAST('" . $crow['book_cost'] . "' AS DECIMAL(7,4))";
            if (mysqli_query ($connection, $sql2))  echo '2';
            // else  echo '0'/;
            // echo ' ' . $sql2;
        }
        else
        {
            $nquan = $b_row['book_quantity'] + $row['added_quantity'];
            $sql = "UPDATE books SET book_quantity='$nquan' WHERE book_id='$bid'";
            if (mysqli_query ($connection, $sql))   echo '1';
        }

        // Delete from writed_off_books
        $sql = "DELETE FROM writed_off_books WHERE off_id='$won_id'";
        if (mysqli_query ($connection, $sql))   echo '1';
    }


    // echo $query;
?>