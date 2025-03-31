<div class="modal fade" id="edit-borrow-book">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Borrowed Book</h4>
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
                                    <th>Published Year</th>
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
                                    <th>Added Date</th>
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
                                    // $student_c = array ("Başlangyç (1-4)", "Orta (5-10)", "Uly (11-12)");
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
                                                if (!empty($book['student_cat']))  echo $student_c[ $book['student_cat'] - 1 ] . " grade";
                                            echo "</td>";
                                            echo "<td>";
                                                if (!empty($book['book_chapter']))    echo $book['book_chapter'] . 'chapter';
                                            echo "</td>";
                                            // echo "<td>";
                                            //     if (!empty($book['book_number']))    echo '№' . $book['book_number'];
                                            // echo "</td>";
                                            echo "<td>";
                                                if (!empty($book['book_quantity']))  echo $book['book_quantity'];
                                            echo "</td>";
                                            echo "<td>" . $book['writed_on_date'] . " </td>";
                                            echo '<td><button type="button" class="btn btn-primary btn-sm select_book">Choose</button> </td>';

                                        echo '</tr>';
                                    }

                                ?>

                            </tbody>
                        </table><br>

                        <div class="row">
                            <!-- ---------------1st column--------- -->

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <!-- b_book = like borrow_book -->
                                        <label for="eborrow_id">Borrower ID</label>
                                        <input type="number" class="form-control" name="eborrow_id" id="eborrow_id" placeholder="Borrower ID" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <!-- b_book = like borrow_book -->
                                        <label for="eb_book_id">Book ID</label>
                                        <input type="number" class="form-control" name="eb_book_id" id="eb_book_id" placeholder="Book ID">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="eborrow_teacher">Teacher</label>
                                    <select class="form-control" name="eborrow_teacher" id="eborrow_teacher">
                                        <option value="">Choose Teacher</option>
                                        <?php
                                            $query = "SELECT * FROM teachers WHERE teacher_exist='true'";
                                            $query_run = mysqli_query ($connection, $query);
                                            // unset ($teachers);

                                            while ($query_row = mysqli_fetch_assoc ($query_run))    $teachers[] = $query_row;
                                            
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
                                    <label for="eb_book_quantity">Book Quantity</label> <span class="" style="float: right;"> <span id="eleft_book"></span> left</span>
                                    <input type="number" class="form-control" name="eb_book_quantity" id="eb_book_quantity" placeholder="Book Quantity" min=1>
                                </div>
                            </div>
                            
                            <!-- ---------------2nd column--------- -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="eb_student_class">Class</label>
                                    <select class="form-control" name="eb_student_class" id="eb_student_class">
    
                                        <option value="">Choose Class</option>
                                        <option value="0">Teachers with no class</option>
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
                                    <label for="eborrow_student">Student</label>
                                    <select class="form-control" name="eborrow_student" id="eborrow_student">
                                        <option value="">Choose Student</option>
                                        
                                        <?php
                                        
                                        $query = "SELECT * FROM students WHERE student_exist='true'";
                                        $query_run = mysqli_query ($connection, $query);
                                        
                                        // unset ($students);
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
                                <button type="submit" id="eb_submit" name="eb_submit" class="btn btn-primary">Edit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>

                            <!-- ---------------3rd column--------- -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="eb_people_cat">Occupation</label>
                                    <select class="form-control" name="eb_people_cat" id="eb_people_cat">
                                        <option value="0">Student</option>
                                        <option value="1">Teacher</option>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="eborrow_date">Borrowed Date</label>
                                    <input type="date" class="form-control" name="eborrow_date" id="eborrow_date" placeholder="Borrowed Date">
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

    $('#eb_student_class').change(function() {
        // if ($(this).val() != -1)    $('#eborrow_student').removeAttr('disabled');
        // else    $('#eborrow_student').attr('disabled', 'disabled');

        $('#eborrow_teacher option').show();
        $('#eborrow_student option').show();


        $('#eborrow_teacher option:not(.' + $('#eb_student_class').val() + ')').hide();
        $('#eborrow_student option:not(.' + $('#eb_student_class').val() + ')').hide();

        $('#eborrow_teacher option').removeAttr ('selected');
        $('#eborrow_student option').removeAttr ('selected');

        $('#eborrow_student').val(0);
        $('#eborrow_teacher').val(0);

        $('#eborrow_teacher option[class="' + $('#eb_student_class').val() + '"').attr ('selected', true)
        $('#eborrow_student option[class="' + $('#eb_student_class').val() + '"').attr ('selected', true)


    });

    $('#eb_people_cat').change(function() {
        
        if ($('#eb_people_cat').val() == 0)
        {
            $('#eborrow_teacher').attr('disabled', 'disabled');
            $('#eborrow_student').removeAttr('disabled');
        }
        else
        {
            $('#eborrow_student').attr('disabled', 'disabled');
            $('#eborrow_teacher').removeAttr('disabled');
        }
    });
  

//   ----------------------SELECT BOOK FROM SEARCH TABLE-------------------------

    $('.select_book').click(function() {
        $('#eb_book_id').val($(this).parent().parent().children().html());

        $.post('../books/left_book.php', {
            book_id: $('#eb_book_id').val(),
            from_b_books: 1,
            borrow_id: $('#eborrow_id').val()
        }, function(data) {
            $('#eleft_book').html(data);

            $('#eb_book_quantity').attr('max', data);
            if (data <= 0)
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
        });
    });

    // $('#eb_submit').on ('click', function() {
    //     $('select').attr ('disabled', false);
    // });
</script>



<?php

    if (isset ($_POST['eb_submit']))
    {
        if (((isset ($_POST['eborrow_student'])  &&  $_POST['eborrow_student'] != 0)  ||  (isset ($_POST['eborrow_teacher'])  &&  $_POST['eborrow_teacher'] != 0))  &&  isset ($_POST['eb_student_class'])  &&  $_POST['eb_student_class'] != -1)
        {

            // print_r ($_POST['borrow_student']);
            $t = 0;
            if ($_POST['eb_people_cat'] == 1)
            {
                $borrower = $_POST['eborrow_teacher'];
                $borrow = array ($_POST['eb_book_id'], $_POST['eborrow_date'], 'NULL', '0', 'NULL', $borrower, $_POST['eb_book_quantity'], '1');
            // $t = 1;
            }
            if ($_POST['eb_people_cat'] == 0)
            {
                $borrower = $_POST['eborrow_student'];
                $borrow = array ($_POST['eb_book_id'], $_POST['eborrow_date'], 'NULL', '0', $borrower, 'NULL', $_POST['eb_book_quantity'], '1');
            }


                    
            // $str = implode (", ", $borrow);

            $query = "UPDATE borrowed_books SET book_id='$borrow[0]', borrow_date='$borrow[1]', ";
            $query .= "return_date=$borrow[2], book_return=$borrow[3], student_id=$borrow[4], ";
            $query .= "teacher_id=$borrow[5], book_quantity='$borrow[6]', borrow_exist='$borrow[7]' ";
            $query .= "WHERE borrow_id=" . $_POST['eborrow_id'];

            mysqli_query ($connection, $query);
            // echo '<script>console.log("' . $query . '");</script>';
            
            header ("location: borrowed&returned.php");
        }
        else    echo "<script>alert ('Please Select Teacher or Student or Class');</script>";
    }


?>