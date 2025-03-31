<div class="modal fade" id="edit-borrower">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit People</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" role="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="people_id">ID</label>
                                <input type="number" class="form-control" name="people_id" id="people_id" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="e_people_cat">Occupation</label>
                                <input type="text" class="form-control" name="e_people_cat" id="e_people_cat" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="e_first_name">First Name</label>
                            <input type="text" class="form-control" name="e_first_name" id="e_first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="e_last_name">Last Name</label>
                            <input type="text" class="form-control" name="e_last_name" id="e_last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="e_student_teacher">Student's Teacher</label>
                            <select class="form-control" name="e_student_teacher" id="e_student_teacher">
                              <option value="">Select Teacher</option>
                                <?php
                                
                                  $query = "SELECT * FROM teachers WHERE teacher_exist='true'";
                                  $query_run = mysqli_query ($connection, $query);

                                  unset($teachers);
                                  while ($query_row = mysqli_fetch_assoc ($query_run))    $teachers[] = $query_row;
                        
                                  foreach ($teachers as $val)
                                  {
                                    echo '<option value="' . $val['teacher_id'] . '" class="' . $val['class_id'] . '">' . 
                                    $val['first_name'] . ' ' . $val['last_name'] . '</option>';
                                  }
                                
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="e_student_class">Class</label>
                            <select class="form-control" name="e_student_class" id="e_student_class">
                              <option value="0">Select Class</option>
                              <?php
                              
                                $query = "SELECT * FROM classes";
                                $query_run = mysqli_query ($connection, $query);

                                unset ($classes);
                                while ($query_row = mysqli_fetch_assoc ($query_run))    $classes[] = $query_row;

                                foreach ($classes as $class)
                                {
                                  $zb = $class['class_id'];
                                  $query = "SELECT class_id FROM teachers WHERE class_id='$zb' && teacher_exist='true'";
                                  $query_run = mysqli_query($connection, $query);

                                  //yes teacher no teacher for nowing which class left to add a teacher
                                  if (mysqli_num_rows ($query_run) == 0)
                                  {
                                    echo '<option value="' . $class['class_id'] . '" class="no_teacher">' . 
                                    $class['class_name'] . '</option>';
                                  }
                                  else
                                  {
                                    echo '<option value="' . $class['class_id'] . '" class="yes_teacher">' . 
                                    $class['class_name'] . '</option>';
                                  }

                                  
                                }

                              ?>

                            </select>
                        </div>
                            <button type="submit" class="btn btn-primary update_people" name="e_submit">Edit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            
                    </div>
                    <!-- /.card-body -->
                    
                </form>
              </div>
          </div>
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- ----------------SCRIPT and PHP------------- -->

<script>
    
  $(document).ready(function() {
    $('#e_people_cat').change (function() {
    
        if ($('.form_control').parent('#add-borrower'))
            $('.form-control').parent('#add-borrower').removeAttr('disabled');

        var cat_no = $(this).children("option:selected").val();
        if (cat_no == 'teachers')
        {
            $('#e_student_teacher').attr('disabled', 'disabled');
            $('.update_people').removeAttr('disabled');
            $('.yes_teacher').hide();
        }   
        else
        {
            $('#e_student_teacher').removeAttr('disabled');
            $('.update_people').attr('disabled', 'disabled');
            $('.yes_teacher').show();
        }

    });


    // ------------------Class and Teacher onChange---------------

    $('#e_student_teacher').change (function() {
        $('#e_student_teacher option').removeAttr('selected');
        $('#e_student_class').val ( $(this).children('option:selected').attr('class') );


    // -------Check if val != 0-------
        if (($('#e_student_class').val() == '0'  ||  $(this).val() == '0')  &&  $('#e_people_cat').val() == 'students')
            $('.update_people').attr('disabled', 'disabled');
        else
            $('.update_people').removeAttr('disabled');

    });

    $('#e_student_class').change (function() {
        $('#e_student_teacher option').removeAttr('selected');

        if ($('#e_student_teacher option[class="' + $(this).val() + '"]').html() != undefined)
        $('#e_student_teacher option[class="' + $(this).val() + '"]').attr('selected', 'selected');
        else
            $('#e_student_teacher').val(0);

    // -------Check if val != 0-------

    if (($('#e_student_teacher').val() == '0'  ||  $(this).val() == '0')  &&  $('#e_people_cat').val() == 'students')
        $('.update_people').attr('disabled', 'disabled');
    else
        $('.update_people').removeAttr('disabled');

    });


    //   ----------------------------------------Edit-People--------------------------------------------

    $('.edit_people').click (function() {

        // ---------People_Cat and ID-----------

        var p_cat = $(this).parent().parent().children().eq(3).html();
        if (p_cat == 'Student')
        {
            $('#people_id').val($(this).parent().parent().children().eq(2).html());
            $('#e_people_cat').val('Student');
            // $('#e_people_cat').val('Okuwçy');

            var tn = $(this).parent().parent().children().eq(6).attr('teacher_id');
            $('#e_student_teacher').val (tn);

            $('#e_student_teacher').removeAttr ('disabled');
        }
        else
        {
            $('#people_id').val($(this).parent().parent().children().eq(1).html());
            $('#e_student_teacher').val(0);
            $('#e_people_cat').val('Teacher');
            // $('#e_people_cat').val('Mugallym');

            $('#e_student_teacher').attr ('disabled', 'disabled');
        }

        // ----------------People-Name--------------
        var name = $(this).parent().parent().children().eq(5).html();
        var arr = name.split (' ');
        $('#e_first_name').val(arr[0]);
        $('#e_last_name').val(arr[1]);

        //-----------People-Class------------

        $('#e_student_class').val ($(this).parent().parent().children(':eq(4)').attr('class_id'));

    });
  });

</script>


<?php

    if (isset ($_POST['e_submit']))
    {
        $people_id = $_POST['people_id'];
        $people_cat = $_POST['e_people_cat']; 
        $class = $_POST['e_student_class'];
        $first_name = $_POST['e_first_name'];
        $last_name = $_POST['e_last_name'];
        if (isset ($_POST['e_student_teacher']))    $teacher = $_POST['e_student_teacher'];

        $query = "UPDATE ";
        if ($people_cat == 'Student')    $query = $query . "students SET teacher_id='$teacher', class_id='$class', first_name='$first_name', last_name='$last_name' WHERE student_id='$people_id'";
        else    $query = $query . "teachers SET class_id='$class', first_name='$first_name', last_name='$last_name' WHERE teacher_id='$people_id'";

        mysqli_query($connection, $query);
        header("location: people.php");
    }

?>
    
