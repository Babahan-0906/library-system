<?php require_once '../init.php'; ?>
<?php

    $bi = $_POST['book_id'];
    $pc = $_POST['people_cat'];

    $query = "SELECT * FROM borrowed_books WHERE borrow_id='$bi'";
    $book = mysqli_fetch_assoc ( mysqli_query ($connection, $query));
    // print_r ($book);
    // while ($query_row = mysqli_fetch_assoc($query_run))    $books[] = $query_row;
    echo "<script>";
        echo "$('#eb_book_id').val(" . $book['book_id'] . ");";
        if ($pc == 'Teacher')
        {
            $sql = "SELECT class_id FROM teachers WHERE teacher_id=" . $book['teacher_id'];
            $class = mysqli_fetch_assoc (mysqli_query ($connection, $sql));
            echo "$('#eb_student_class').val(" . $class['class_id'] . ');';

            echo "$('#eborrow_student').val(0);";
            echo "$('#eborrow_teacher').removeAttr('disabled');";
            echo "$('#eborrow_student').attr('disabled', true);";

            echo "$('#eborrow_teacher').val(" . $book['teacher_id'] . ');';
            echo "$('#eb_people_cat').val(1);";
        }
        else
        {
            $sql = "SELECT class_id FROM students WHERE student_id=" . $book['student_id'];
            $class = mysqli_fetch_assoc (mysqli_query ($connection, $sql));
            echo "$('#eb_student_class').val(" . $class['class_id'] . ');';
            
            echo "$('#eborrow_teacher').val(0);";
            echo "$('#eborrow_student').removeAttr('disabled');";
            echo "$('#eborrow_teacher').attr('disabled', true);";

            echo "$('#eborrow_student').val(" . $book['student_id'] . ');';
            echo "$('#eb_people_cat').val(0);";
        }
        
        echo "$('#eb_book_quantity').val(" . $book['book_quantity'] . ");";
        echo "$('#eborrow_date').val('" . $book['borrow_date'] . "');";

        echo "
            $.post('../books/left_book.php', {
                book_id: " . $book['book_id'] . "
            }, function(data) {
                $('#eleft_book').html(+data + +" . $book['book_quantity'] . ");
                console.log (data);
                $('#eb_book_quantity').attr('max', +data + +" . $book['book_quantity'] . ");
                if (+data + +" . $book['book_quantity'] . " <= 0)
                {
                    $('#eleft_book').parent().removeClass('text-primary');
                    $('#eleft_book').parent().addClass('text-danger');
                    $('#eb_submit').attr ('disabled', 'disabled');
                }
                else
                {
                    $('#eleft_book').parent().removeClass('text-danger');
                    $('#eleft_book').parent().addClass('text-primary');
                    $('#eb_submit').removeAttr ('disabled');
                }
            }); ";

    echo "</script>";
?>