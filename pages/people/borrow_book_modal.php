<div class="modal fade" id="borrow-book">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Borrower</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <!-- ---------------------Search-a-Book----------------------------- -->

                        <table id="example4" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Subject</th>
                                    <th>Category</th>
                                    <th>Serial Number</th>
                                    <th>Book Title</th>
                                    <th>Author</th>
                                    <th>Copyright Year</th>
                                    <th>Language</th>
                                    <th>Grade</th>
                                    <th>Student Category</th>
                                    <!-- <th>Kim Tarapyndan Berildi</th> -->
                                    <!-- <th>Mekdep Ady</th> -->
                                    <th>Chapter</th>
                                    <!-- <th>Nomeri</th> -->
                                    <th>Quantity</th>
                                    <!-- <th>Bahasy</th> -->
                                    <!-- <th>Jemi Bahasy</th> -->
                                    <th>Borrowed Date</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                    $query = "SELECT * FROM books WHERE book_exist='true'";
                                    $query_run = mysqli_query ($connection, $query);

                                    unset ($books);
                                    while ($query_row = mysqli_fetch_assoc ($query_run))    $books[] = $query_row;

                                    // $cats = array ("Okuw Kitap", "Çeper Eser", "Ýazuw Depder", "Mugallym Gollanma", "Prezidentiň Kitaby", "Zambak Kitap", "Başga Mekdepden Alynan Kitap");
                                    $cats = array ("Schoolbook", "Literary Book", "Primaries Copybook", "Teachers Guide", "President Book", "Zambak Book", "Borrowed from Other Schools");
                                    $student_c = array ("Elementary (1-4)", "Middle (5-10)", "High (11-12)");
                                    foreach ($books as $book)
                                    {
                                        echo '<tr>';

                                            echo "<td>" . $book['book_id'] . "</td>";
                                            echo "<td>" . $book['book_subject'] . "</td>";
                                            echo "<td>" . $cats[ $book['cat_id'] - 1] . "</td>";
                                            echo "<td>SN: " . $book['book_serialnumber'] . "</td>";
                                            echo "<td>" . $book['book_name'] . "</td>";
                                            echo "<td>" . $book['book_author'] . "</td>";
                                            echo "<td>" . $book['book_year'] . "</td>";
                                            echo "<td>" . $book['book_language'] . "</td>";
                                            echo "<td>";
                                                if (!empty($book['book_class']))  echo $book['book_class'];
                                            echo "</td>";
                                            echo "<td>";
                                                if (!empty($book['student_cat']))  echo $student_c[ $book['student_cat'] - 1 ];
                                            echo "</td>";
                                            echo "<td>";
                                                if (!empty($book['book_chapter']))    echo $book['book_chapter'];
                                            echo "</td>";
                                            // echo "<td>";
                                            //     if (!empty($book['book_number']))    echo '№' . $book['book_number'];
                                            // echo "</td>";
                                            echo "<td>";
                                                if (!empty($book['book_quantity']))  echo $book['book_quantity'];
                                            echo "</td>";
                                            echo "<td>" . $book['writed_on_date'] . " </td>";
                                            echo '<td><button type="button" class="btn btn-primary btn-sm select_book">Select</button> </td>';

                                        echo '</tr>';
                                    }

                                ?>

                            </tbody>
                        </table><br>

                        <div class="row">
                            <!-- ---------------1st column--------- -->

                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- b_book = like borrow_book -->
                                    <label for="b_book_id">Book ID</label>
                                    <input type="number" class="form-control" name="b_book_id" id="b_book_id" placeholder="Book ID">
                                </div>
                                <div class="form-group ">
                                    <label for="borrow_teacher">Teacher</label>
                                    <select class="form-control" name="borrow_teacher" id="borrow_teacher" >
                                        <option value="">Select Teacher</option>
                                        <?php
                                        
                                        // $i = 1;
                                        foreach ($teachers as $teacher)
                                        {
                                            echo '<option value="' . $teacher['teacher_id'] . '" class="' . $teacher['class_id'] . '">' . 
                                             $teacher['first_name'] . ' ' . $teacher['last_name'] . '</option>';
                                            
                                            // $i ++;
                                        }
                                        
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="b_book_quantity">No. of Copies</label> <span class="" style="float: right;"> <span id="left_book"></span> left</span>
                                    <input type="number" class="form-control" name="b_book_quantity" id="b_book_quantity" placeholder="No. of Copies" min=1 value="1">
                                </div>
                            </div>
                            
                            <!-- ---------------2nd column--------- -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="b_student_class">Class</label>
                                    <select class="form-control" name="b_student_class" id="b_student_class" >
    
                                        <option value="">Select Class</option>
                                        <option value="0">Teachers without Class</option>
                                        <?php
                                        
                                            $query = "SELECT * FROM classes";
                                            $query_run = mysqli_query($connection, $query);
    
                                            unset($classes);
                                            while ($query_row = mysqli_fetch_assoc ($query_run))    $classes[] = $query_row;
    
                                            foreach ($classes as $class)    echo '<option value="' . $class['class_id'] . '">' . $class['class_name'] . '</option>';
    
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="borrow_student">Student</label>
                                    <select class="form-control" name="borrow_student" id="borrow_student" >
                                        <option value="">Select Student</option>
                                        <?php
                                        
                                        $query = "SELECT * FROM students WHERE student_exist='true'";
                                        $query_run = mysqli_query ($connection, $query);
                                        
                                        while ($query_row = mysqli_fetch_assoc ($query_run))    $students[] = $query_row;
                                        
                                        // $i = 1;
                                        foreach ($students as $student)
                                        {
                                            echo '<option value="' . $student['student_id'] . '" class="' . $student['class_id'] . '">' . 
                                             $student['first_name'] . ' ' . $student['last_name'] . '</option>';
                                            
                                            // $i ++;
                                        }
                                        
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" id="b_submit" name="b_submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>

                            <!-- ---------------3rd column--------- -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="b_people_cat">Occupation</label>
                                    <select class="form-control" name="b_people_cat" id="b_people_cat" >
                                        <option value="0">Student</option>
                                        <option value="1">Teacher</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="borrow_date">Borrowed Date</label>
                                    <input type="date" class="form-control" name="borrow_date" id="borrow_date" placeholder="Borrowed Date">
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- /.card-body -->
                    
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- ------------------------SCRIPT and PHP---------------------- -->

<script>

    // ------------------CLASS AND TEACHER ON CHANGE---------------

    $('#b_student_class').change(function() {
        // if ($(this).val() != -1)    $('#borrow_student').removeAttr('disabled');
        // else    $('#borrow_student').attr('disabled', 'disabled');

        $('#borrow_teacher option').show();
        $('#borrow_student option').show();


        $('#borrow_teacher option:not(.' + $('#b_student_class').val() + ')').hide();
        $('#borrow_student option:not(.' + $('#b_student_class').val() + ')').hide();

        $('#borrow_teacher option').removeAttr ('selected');
        $('#borrow_student option').removeAttr ('selected');

        $('#borrow_student').val(0);
        $('#borrow_teacher').val(0);

        $('#borrow_teacher option[class="' + $('#b_student_class').val() + '"').attr ('selected', true)
        $('#borrow_student option[class="' + $('#b_student_class').val() + '"').attr ('selected', true)


    });

    $('#b_people_cat').change(function() {
        
        if ($('#b_people_cat').val() == 0)
        {
            $('#borrow_teacher').attr('disabled', 'disabled');
            $('#borrow_student').removeAttr('disabled');
        }
        else
        {
            $('#borrow_student').attr('disabled', 'disabled');
            $('#borrow_teacher').removeAttr('disabled');
        }
    });

//   ----------------------SELECT BOOK FROM SEARCH TABLE-------------------------

    $('.select_book').click(function() {
        $('#b_book_id').val($(this).parent().parent().children().html());

        $.post('../books/left_book.php', {
            book_id: $('#b_book_id').val()
        }, function(data) {
            $('#left_book').html(data);

            $('#b_book_quantity').attr('max', data);
            if (data <= 0)
            {
                $('#left_book').parent().removeClass('text-primary');
                $('#left_book').parent().addClass('text-danger');
                $('#b_submit').attr ('disabled', 'disabled');
            }
            else
            {
                $('#left_book').parent().removeClass('text-danger');
                $('#left_book').parent().addClass('text-primary');
                $('#b_submit').removeAttr ('disabled');
            }
        });
    });

</script>



<?php

    if (isset ($_POST['b_submit']))
    {
        if (((isset ($_POST['borrow_student'])  &&  $_POST['borrow_student'] != 0)  ||  (isset ($_POST['borrow_teacher'])  &&  $_POST['borrow_teacher'] != 0))  &&  (isset ($_POST['b_student_class'])  &&  $_POST['b_student_class'] != -1))
        {
            // print_r ($_POST['borrow_student']);
            $t = 0;
            if ($_POST['b_people_cat'] == 1)
            {
                $borrower = $_POST['borrow_teacher'];
                $borrow = array ($_POST['b_book_id'], "'" . $_POST['borrow_date'] . "'", 'NULL', 'false', 'NULL', $borrower, $_POST['b_book_quantity'], 'true');
            }
            if ($_POST['b_people_cat'] == 0)
            {
                $borrower = $_POST['borrow_student'];
                $borrow = array ($_POST['b_book_id'], "'" . $_POST['borrow_date'] . "'", 'NULL', 'false', $borrower, 'NULL', $_POST['b_book_quantity'], 'true');
            }    


                    
            // echo '<script>console.log("' . $str . '");</script>';
            $str = implode (", ", $borrow);

            $query = "INSERT INTO `borrowed_books`(`book_id`, `borrow_date`, `return_date`, `book_return`, `student_id`, `teacher_id`, `book_quantity`, `borrow_exist`) VALUES (";
            $query .= $str . ')';

            mysqli_query ($connection, $query);
            // echo '<script>console.log("' . $query . '");</script>';
            
            header ("location: people.php");
        }
        else    echo "<script>alert ('Teacher, Student, Class can't be empty');</script>";
    }


?>