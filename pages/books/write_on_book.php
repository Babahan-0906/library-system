<?php
    require_once '../init.php';

    $bid = $_POST['book_id'];
    $bquan = $_POST['book_quantity'];
    $aquan = $_POST['added_quantity'];
    $date = $_POST['writed_on_date'];

    // -----Insert into writed_on_books-----
    $sql = "INSERT INTO writed_on_books SET book_id='$bid', book_quantity='$bquan', ";
    $sql .= "added_quantity='$aquan', writed_on_date='$date'";

    if (mysqli_query ($connection, $sql))  echo '1';
    else   echo '0';


    // -----Update book_quantiyt-----
    $bquan += $aquan;

    $sql = "UPDATE books SET book_quantity='$bquan', book_exist='true' WHERE book_id='$bid'";
    if (mysqli_query ($connection, $sql))  echo '1';
    else   echo '0';

?>