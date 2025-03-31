<?php
    require_once ('../init.php');

    $tid = $_POST['tid'];
    $sid = $_POST['sid'];
    $date = date('Y-m-d');

    if (!empty($tid))
    {
        $sql = "SELECT book_quantity FROM borrowed_books WHERE teacher_id='$tid'";
        $run = mysqli_query ($connection, $sql);

        $sum = 0;
        while ($row = mysqli_fetch_assoc ($run))  $sum += $row['book_quantity'];

        if ($sum == 0)
        {
            $query = "UPDATE teachers SET teacher_exist='false', removed_date='$date' WHERE teacher_id='$tid'";
            mysqli_query ($connection, $query);
        }
        else
        {
            echo "Can't delete. This teacher borrowed a book.";
        }
    }
    if (!empty($sid))
    {
        $sql = "SELECT book_quantity FROM borrowed_books WHERE student_id='$sid'";
        $run = mysqli_query ($connection, $sql);

        $sum = 0;
        while ($row = mysqli_fetch_assoc ($run))  $sum += $row['book_quantity'];

        if ($sum == 0)
        {
            $query = "UPDATE students SET student_exist='false', removed_date='$date' WHERE student_id='$sid'";
            mysqli_query ($connection, $query);
        }
        else
        {
            echo "Can't delete. This student borrowed a book.";
        }
    }

    // echo $query;
?>