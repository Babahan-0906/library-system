<?php require_once '../init.php'; ?>
<?php

    $bi = $_POST['book_id'];

    $query = "SELECT * FROM writed_on_books WHERE book_id='$bi'";
    $book = mysqli_fetch_assoc ( mysqli_query ($connection, $query));
    // print_r ($book);
    // while ($query_row = mysqli_fetch_assoc($query_run))    $books[] = $query_row;
    echo "<script>";

        echo "
        function disableFormEe (cat_no)
        {
            $('.form-control').each (function() {
                if ($(this).parents('#edit-book').length > 0)    $(this).removeAttr('disabled');
            })
            if (cat_no == 1)    $('#e_book_name, #e_book_serialnumber, #e_book_language, #e_student_cat, #e_book_school, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
            if (cat_no == 2)    $('#e_book_subject, #e_book_class, #e_book_school, #e_book_chapter').attr('disabled', 'disabled');
            if (cat_no == 3)    $('#e_book_name, #e_book_serialnumber, #e_book_language, #e_student_cat, #e_book_school, #e_book_edition').attr('disabled', 'disabled');
            if (cat_no == 4)    $('#e_book_language, #e_book_serialnumber, #e_student_cat, #e_book_class, #e_book_school, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
            if (cat_no == 5)    $('#e_book_subject, #e_book_serialnumber, #e_book_class, #e_book_language, #e_student_cat, #e_book_school, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
            if (cat_no == 6)    $('#e_book_language, #e_book_serialnumber, #e_student_cat, #e_book_class, #e_book_school, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
            if (cat_no == 7)    $('#e_book_name, #e_book_serialnumber, #e_book_language, #e_student_cat, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
        }
        ";
        echo 'disableFormEe (' . $book['cat_id'] . ');';

        echo "$('#e_book_id').val(" . $book['book_id'] . ");";
        echo "$('#e_book_category').val(" . $book['cat_id'] . ");";
        echo "$('#e_book_serialnumber').val('" . $book['book_serialnumber'] . "');";
        echo "$('#e_book_name').val('" . $book['book_name'] . "');";
        echo "$('#e_book_author').val('" . $book['book_author'] . "');";
        echo "$('#e_book_year').val(" . $book['book_year'] . ");";
        echo "$('#e_book_language').val('" . $book['book_language'] . "');";
        echo "$('#e_book_subject').val('" . $book['book_subject'] . "');";
        if (!empty($book['book_class']))   echo "$('#e_book_class option[value=" . $book['book_class'] . "]').attr('selected', 'selected');";
        if (!empty($book['student_cat']))   echo "$('#e_student_cat option[value=" . $book['student_cat'] . "]').attr('selected', 'selected');";
        echo "$('#e_book_edition').val('" . $book['book_edition'] . "');";
        echo "$('#e_book_school').val('" . $book['book_school'] . "');";
        echo "$('#e_book_chapter').val('" . $book['book_chapter'] . "');";
        echo "$('#e_book_quantity').val(" . $book['book_quantity'] . ");";
        echo "$('#e_book_cost').val(" . $book['book_cost'] . ");";
        echo "$('#e_writed_on_date').val('" . $book['writed_on_date'] . "');";
        // echo "$('#e_book_number').val('" . $book['book_number'] . "');";
    echo "</script>";
?>