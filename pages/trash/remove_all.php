<?php
    require_once '../init.php';

    if ($_POST['books'] == 0)  $query = "DELETE FROM books WHERE book_exist='false' AND cat_id='7'";
    else
    {
        $query = "DELETE FROM students WHERE student_exist='false'";
        $query2 = "DELETE FROM teachers WHERE teacher_exist='false'";
        mysqli_query ($connection, $query2);
    }
    mysqli_query ($connection, $query);

    echo 'deleted';

?>