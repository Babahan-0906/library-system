<div class="modal fade" id="borrow-book">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Karzyna Kitap Ber</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <!-- b_book = like borrow_book -->
                                <label for="b_book_id">Kitap ID</label>
                                <input readonly type="number" class="form-control" name="b_book_id" id="b_book_id" placeholder="Kitap ID">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="student_class">Synpy</label>
                                <select class="form-control" name="student_class" id="student_class">

                                    <option value="-1">Synp Saýla</option>
                                    <option value="0">Synpsyz Mugallymlar</option>
                                    <?php
                                    
                                        $query = "SELECT * FROM classes";
                                        $query_run = mysqli_query($connection, $query);

                                        while ($query_row = mysqli_fetch_assoc ($query_run))    $classes[] = $query_row;

                                        foreach ($classes as $class)    echo '<option value="' . $class['class_id'] . '">' . $class['class_name'] . '</option>';

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="people_cat">Wezipesi</label>
                            <select class="form-control" name="people_cat" id="people_cat">
                                <option value="0">Okuwçy</option>
                                <option value="1">Mugallym</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="borrow_teacher">Mugallym</label>
                            <select class="form-control" name="borrow_teacher[]" id="borrow_teacher" disabled="disabled" multiple>
                                <?php
                                
                                    $query = "SELECT * FROM teachers WHERE teacher_exist='true'";
                                    $query_run = mysqli_query ($connection, $query);

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
                            <label for="borrow_student">Okuwçy</label>
                            <select class="form-control" name="borrow_student[]" id="borrow_student" multiple="2">
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
                        <div class="form-group ">
                            <label for="borrow_date">Karz Alynan Güni</label>
                            <input type="date" class="form-control" name="borrow_date" id="borrow_date" placeholder="Karz Alynan Güni">
                        </div>
                        <div class="form-group ">
                            <label for="b_book_quantity">Kitap Sany</label> <span class="" style="float: right;"> <span id="left_book" name="b_book_left"></span> sany galdy</span>
                            <input type="number" class="form-control" name="b_book_quantity" id="b_book_quantity" placeholder="Kitap Sany" min=1 value=1>
                        </div>
                            <button type="submit" id="b_submit" name="b_submit" class="btn btn-primary">Goş</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Ýatyr</button>
                            
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

    $('#student_class').change(function() {
        // if ($(this).val() != -1)    $('#borrow_student').removeAttr('disabled');
        // else    $('#borrow_student').attr('disabled', 'disabled');

        $('#borrow_teacher option').show();
        $('#borrow_student option').show();
        // $('#borrow_teacher option').removeAttr('selected');
        // $('#borrow_student option').removeAttr('selected');


        $('#borrow_teacher option:not(.' + $('#student_class').val() + ')').hide();
        $('#borrow_student option:not(.' + $('#student_class').val() + ')').hide();




    });

    $('#people_cat').change(function() {
        
        if ($('#people_cat').val() == 0)
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

    $('#b_book_quantity, #people_cat, #borrow_student, #borrow_teacher').on ('change keyup', function() {

        console.log('1111');
        var a = $('#b_book_quantity').val(), b
        
        if ($('#people_cat').val() == 0)    b = $('#borrow_student').val().length;
        else    b = $('#borrow_teacher').val().length;

        if (+a * b  > $('#left_book').html())    $('#b_submit').attr ('disabled', true);
        else    $('#b_submit').removeAttr ('disabled');

    });

</script>



<?php

    if (isset ($_POST['b_submit']))
    {
        if (isset ($_POST['borrow_teacher']))    $borrower = $_POST['borrow_teacher'];
        if (isset ($_POST['borrow_student']))    $borrower = $_POST['borrow_student'];


        for ($i=0; $i<sizeof($borrower); $i++)
        {
            if (!empty ($_POST['borrow_student']))    $borrow = array ($_POST['b_book_id'], "'" . $_POST['borrow_date'] . "'", 'NULL', 'false', $borrower[$i], 'NULL', $_POST['b_book_quantity'], 'true');
            else    $borrow = array ($_POST['b_book_id'], "'" . $_POST['borrow_date'] . "'", 'NULL', 'false', 'NULL', $borrower[$i], $_POST['b_book_quantity'], 'true');
            
            $str = implode (", ", $borrow);

            $query = "INSERT INTO `borrowed_books`(`book_id`, `borrow_date`, `return_date`, `book_return`, `student_id`, `teacher_id`, `book_quantity`, `borrow_exist`) VALUES (";
            $query .= $str . ')';

            mysqli_query ($connection, $query);
            // echo '<script>console.log("' . $query . '");</script>';

        }
        
        header ("location: books.php");

    }

?>