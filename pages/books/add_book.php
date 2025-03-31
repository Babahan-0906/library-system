<?php
    require_once '../init.php';

    
    $book_id = NULL;
    $cat_id = $_POST['book_category'];
    $book_serialnumber = NULL;
    $book_name = NULL;
    $book_author = NULL;
    $book_year = NULL;
    $book_language = NULL;
    $book_subject = NULL;
    $book_class = NULL;
    $book_edition = NULL;
    $student_cat = NULL;
    $book_school = NULL;
    $book_chapter = NULL;
    $book_quantity = NULL;
    $book_cost = NULL;
    // $book_number = NULL;
    $book_exist = 'true';
    $writed_on_date = $_POST['writed_on_date'];

    // echo $cat_id;
    if ($cat_id == 2)
    {
        $book_serialnumber = $_POST['book_serialnumber'];
        $book_name = $_POST['book_name'];
        $book_author = $_POST['book_author'];
        $book_year = $_POST['book_year'];
        $book_language = $_POST['book_language'];
        $student_cat = $_POST['student_cat'];
        $book_edition = $_POST['book_edition'];
        $book_quantity = $_POST['book_quantity'];
        $book_cost = $_POST['book_cost'];

        $sn = explode (' ', $book_serialnumber);
        $query = "INSERT INTO books (cat_id, book_serialnumber, book_name, book_author, book_year, book_language, student_cat, book_edition, book_quantity, book_cost, book_exist) VALUES ";
        $query2 = "SELECT book_id FROM books WHERE (";
        
        for ($i=0; $i<sizeof ($sn); $i++)
        {
        if (!empty($sn[$i][0]))
        {
            $query .= "('$cat_id', '$sn[$i]', '$book_name', '$book_author', '$book_year', '$book_language', '$student_cat', '$book_edition', '$book_quantity', '$book_cost', 'true'), ";
            $query2 .= "book_serialnumber='$sn[$i]' OR ";
        }
        }
        $query = substr ($query, 0, strlen ($query) - 2);
        $query2 = substr ($query2, 0, strlen ($query2) - 4);
        $query2 .= ") AND book_name='$book_name' AND book_author='$book_author' AND book_year='$book_year' AND book_language='$book_language' AND student_cat='$student_cat' AND book_edition='$book_edition' AND book_cost='$book_cost' AND book_exist='true'";

        
        echo '<script>console.log("' . $query2 . '")</script>';
        // mysqli_query ($connection, $query);
        // $query = "";
        // $query2 = "";

        // header("location: books.php"); 
    }
    else
    {
        $query = "INSERT INTO books SET ";
        $query2 = "SELECT * FROM books WHERE ";
        if (isset ($_POST['book_category']))   {   $cat_id = $_POST['book_category'];     $query = $query . "cat_id='$cat_id', ";   $query2 = $query2 . "cat_id='$cat_id' AND ";  }
        // if (isset ($_POST['book_serialnumber']))    {   $book_serialnumber = $_POST['book_serialnumber'];     $query = $query . "book_serialnumber='$book_serialnumber', ";  }
        if (isset ($_POST['book_name']))    {   $book_name = $_POST['book_name'];     $query = $query . "book_name='$book_name', ";   $query2 = $query2 . "book_name='$book_name' AND ";  }
        if (isset ($_POST['book_author']))    {   $book_author = $_POST['book_author'];     $query = $query . "book_author='$book_author', ";   $query2 = $query2 . "book_author='$book_author' AND ";  }
        if (isset ($_POST['book_year']))    {   $book_year = $_POST['book_year'];     $query = $query . "book_year='$book_year', ";   $query2 = $query2 . "book_year='$book_year' AND ";  }
        if (isset ($_POST['book_language']))    {   $book_language = $_POST['book_language'];     $query = $query . "book_language='$book_language', ";   $query2 = $query2 . "book_language='$book_language' AND ";  }
        if (isset ($_POST['book_subject']))   {   $book_subject = $_POST['book_subject'];     $query = $query . "book_subject='$book_subject', ";   $query2 = $query2 . "book_subject='$book_subject' AND ";  }
        if (isset ($_POST['book_class']))   {   $book_class = $_POST['book_class'];     $query = $query . "book_class='$book_class', ";   $query2 = $query2 . "book_class='$book_class' AND ";  }
        if (isset ($_POST['student_cat']))    {   $student_cat = $_POST['student_cat'];     $query = $query . "student_cat='$student_cat', ";   $query2 = $query2 . "student_cat='$student_cat' AND ";  }
        if (isset ($_POST['book_edition']))   {   $book_edition = $_POST['book_edition'];     $query = $query . "book_edition='$book_edition', ";   $query2 = $query2 . "book_edition='$book_edition' AND ";  }
        if (isset ($_POST['book_school']))    {   $book_school = $_POST['book_school'];     $query = $query . "book_school='$book_school', ";   $query2 = $query2 . "book_school='$book_school' AND ";  }
        if (isset ($_POST['book_chapter']))  {   $book_chapter = $_POST['book_chapter'];     $query = $query . "book_chapter='$book_chapter', ";   $query2 = $query2 . "book_chapter='$book_chapter' AND ";  }
        if (isset ($_POST['book_quantity']))    {   $book_quantity = $_POST['book_quantity'];     $query = $query . "book_quantity='$book_quantity', ";  }//$query2 = $query2 . "book_quantity='$book_quantity' AND ";  }
        if (isset ($_POST['book_cost']))    {   $book_cost = $_POST['book_cost'];     $query = $query . "book_cost='$book_cost', ";   $query2 = $query2 . "CAST(book_cost AS DECIMAL(7,4))=CAST('$book_cost' AS DECIMAL(7,4)) AND ";  }
        // if (isset ($_POST['book_number']))    {   $book_number = $_POST['book_number'];     $query = $query . "book_number='$book_number', ";   $query2 = $query2 . "book_number='$book_number' AND ";  }

        $query = $query . "book_exist='$book_exist', writed_on_date='$writed_on_date'";
        $query2 = $query2 . "book_exist='$book_exist'";
    
    }
    
    echo '<script>console.log("' . $query2 . '")</script>';
        // --------Check wether it is duplicate--------
    if (mysqli_num_rows (mysqli_query ($connection, $query2)) == 0) {
        mysqli_query($connection, $query);
        $query = "";
        $query2 = "";
        header("location: books.php"); 
    }
    else
    {
        // echo $query2;
        $str = "Swal.fire({
            icon: 'warning',
            title: 'Do not add the same book!'
        })";
        echo "<script>";
        echo $str;
        echo "</script>";
    }

?>


