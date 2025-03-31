<?php /*
    require_once ('../init.php');

    // -------------Get books and search --------------

    $query = "SELECT * FROM books WHERE book_id=" . $_POST['book_id'];
    $bk = mysqli_fetch_assoc (mysqli_query ($connection, $query));

    // ----------Get Bookid that are similiar------------
    $query = "SELECT book_id FROM books WHERE ";
    if (!empty ($bk['cat_id']))   {   $cat_id = $bk['cat_id'];     $query = $query . "cat_id='$cat_id' AND ";  }
    if (!empty ($bk['book_name']))    {   $book_name = $bk['book_name'];     $query = $query . "book_name='$book_name' AND ";  }
    else    $query .= 'book_name IS NULL AND ';
    if (!empty ($bk['book_author']))    {   $book_author = $bk['book_author'];     $query = $query . "book_author='$book_author' AND ";  }
    else    $query .= 'book_author IS NULL AND ';
    if (!empty ($bk['book_year']))    {   $book_year = $bk['book_year'];     $query = $query . "book_year='$book_year' AND ";  }
    else    $query .= 'book_year IS NULL AND ';
    if (!empty ($bk['book_language']))    {   $book_language = $bk['book_language'];     $query = $query . "book_language='$book_language' AND ";  }
    else    $query .= 'book_language IS NULL AND ';
    if (!empty ($bk['book_subject']))   {   $book_subject = $bk['book_subject'];     $query = $query . "book_subject='$book_subject' AND ";  }
    else    $query .= 'book_subject IS NULL AND ';
    if (!empty ($bk['book_class']))   {   $book_class = $bk['book_class'];     $query = $query . "book_class='$book_class' AND ";  }
    else    $query .= 'book_class IS NULL AND ';
    if (!empty ($bk['student_cat']))    {   $student_cat = $bk['student_cat'];     $query = $query . "student_cat='$student_cat' AND ";  }
    else    $query .= 'student_cat IS NULL AND ';
    if (!empty ($bk['book_edition']))   {   $book_edition = $bk['book_edition'];     $query = $query . "book_edition='$book_edition' AND ";  }
    else    $query .= 'book_edition IS NULL AND ';
    if (!empty ($bk['book_school']))    {   $book_school = $bk['book_school'];     $query = $query . "book_school='$book_school' AND ";  }
    else    $query .= 'book_school IS NULL AND ';
    if (!empty ($bk['book_chapter']))  {   $book_chapter = $bk['book_chapter'];     $query = $query . "book_chapter='$book_chapter' AND ";  }
    else    $query .= 'book_chapter IS NULL AND ';
    if (!empty ($bk['book_quantity']))    {   $book_quantity = $bk['book_quantity'];     $query = $query . "book_quantity='$book_quantity' AND ";  }
    else    $query .= 'book_quantity IS NULL AND ';
    $book_cost = $bk['book_cost'];     $query = $query . "CAST(book_cost AS DECIMAL(7,4))=CAST('$book_cost' AS DECIMAL(7,4)) AND ";
    $query .= 'book_exist="true"';

    // echo $query;

    $run = mysqli_query ($connection, $query);
    unset($books);
    while ($row = mysqli_fetch_assoc ($run))    $books[] = $row;

    // echo mysqli_num_rows ($run);
    // echo $query;
    // print_r($books);
    
    // --------------Get book_quantity from that similiar books-------------------

    $sql = "SELECT book_quantity FROM borrowed_books WHERE ";
    foreach ($books as $id)
        $sql .= "book_id=" . $id['book_id'] . " OR ";
    
    $sql = substr($sql, 0, -4);
    if (isset ($_POST['from_b_books']))
    {
        $sql .= " AND borrow_id!=" . $_POST['borrow_id'];
    }
    
    // echo $sql;

    $run = mysqli_query ($connection, $sql);
    $sum = 0;
    if (mysqli_num_rows ($run) > 0)
    {

        unset ($bq);
        while ($row = mysqli_fetch_assoc ($run))    $bq[] = $row;
        
        foreach ($bq as $s)
        {
            $sum += $s['book_quantity'];
        }
    }

    $ex = 0;
    // if (isset ($_POST['from_b_books'])  &&  $_POST['from_b_books'] == 1)
    // {
    //     $sql = "SELECT book_qua"
    // }

    echo $book_quantity - $sum;

    */
?>


<?php
    require_once ('../init.php');

    $query = "SELECT book_quantity, cat_id FROM books WHERE book_id='" . $_POST['book_id'] . "'";
    $row = mysqli_fetch_assoc (mysqli_query ($connection, $query));
    if ($row['cat_id'] == 2)
        $book_quantity = 1;
    else
        $book_quantity = $row['book_quantity'];

    $sql = "SELECT book_quantity FROM borrowed_books WHERE book_id='" . $_POST['book_id'] . "'";
    
    // $sql = substr($sql, 0, -4);
    if (isset ($_POST['from_b_books']))
    {
        $sql .= " AND borrow_id!=" . $_POST['borrow_id'];
    }
    
    // echo $sql;

    $run = mysqli_query ($connection, $sql);
    $sum = 0;
    if (mysqli_num_rows ($run) > 0)
    {

        unset ($bq);
        while ($row = mysqli_fetch_assoc ($run))    $bq[] = $row;
        
        foreach ($bq as $s)
        {
            $sum += $s['book_quantity'];
        }
    }

    $ex = 0;
    // if (isset ($_POST['from_b_books'])  &&  $_POST['from_b_books'] == 1)
    // {
    //     $sql = "SELECT book_qua"
    // }

    echo $book_quantity - $sum;


?>