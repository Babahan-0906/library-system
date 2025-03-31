<?php
    require_once ('../init.php');

    // -------------Get books and search --------------

    $query = "SELECT * FROM books WHERE book_id=" . $_POST['book_id'];
    $bk = mysqli_fetch_assoc (mysqli_query ($connection, $query));

    // ----------Get Bookid that are similiar------------
    $query = "SELECT book_id FROM books WHERE ";
    if (!empty ($bk['cat_id']))   {   $cat_id = $bk['cat_id'];     $query = $query . "cat_id='$cat_id' AND ";  }
    if (!empty ($bk['book_name']))    {   $book_name = $bk['book_name'];     $query = $query . "book_name='$book_name' AND ";  }
    if (!empty ($bk['book_author']))    {   $book_author = $bk['book_author'];     $query = $query . "book_author='$book_author' AND ";  }
    if (!empty ($bk['book_year']))    {   $book_year = $bk['book_year'];     $query = $query . "book_year='$book_year' AND ";  }
    if (!empty ($bk['book_language']))    {   $book_language = $bk['book_language'];     $query = $query . "book_language='$book_language' AND ";  }
    if (!empty ($bk['book_subject']))   {   $book_subject = $bk['book_subject'];     $query = $query . "book_subject='$book_subject' AND ";  }
    if (!empty ($bk['book_class']))   {   $book_class = $bk['book_class'];     $query = $query . "book_class='$book_class' AND ";  }
    if (!empty ($bk['student_cat']))    {   $student_cat = $bk['student_cat'];     $query = $query . "student_cat='$student_cat' AND ";  }
    if (!empty ($bk['book_edition']))   {   $book_edition = $bk['book_edition'];     $query = $query . "book_edition='$book_edition' AND ";  }
    if (!empty ($bk['book_school']))    {   $book_school = $bk['book_school'];     $query = $query . "book_school='$book_school' AND ";  }
    if (!empty ($bk['book_chapter']))  {   $book_chapter = $bk['book_chapter'];     $query = $query . "book_chapter='$book_chapter' AND ";  }
    if (!empty ($bk['book_quantity']))    {   $book_quantity = $bk['book_quantity'];     $query = $query . "book_quantity='$book_quantity' AND ";  }
    if (!empty ($bk['book_cost']))    {   $book_cost = $bk['book_cost'];     $query = $query . "book_cost='$book_cost' AND ";  }
    $query = $query . "book_exist='true'";

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
    // echo $sql;

    $run = mysqli_query ($connection, $sql);
    $sum = 0;
    if (mysqli_num_rows ($run) > 0)
    {

        unset ($bq);
        while ($row = mysqli_fetch_assoc ($run))    $bq[] = $row;
        
        foreach ($bq as $s)    $sum += $s['book_quantity'];
    }

    if ($sum == 0)
    {
        $book_id = $_POST['book_id'];
        $date = date('Y-m-d');
        
        $query = "UPDATE books SET book_exist='false', removed_date='$date' WHERE book_id='$book_id'";
        mysqli_query ($connection, $query);
        // echo '1';
    }
    else    echo 'This book has been borrowed by student or teacher. You can not delete it!';
    // else    echo 'Bu kitap mugallyma ýa okuwça berildi, şonuň üçin öçürip bolmaýar!';


    // echo $query;
?>