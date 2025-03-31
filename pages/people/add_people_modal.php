<div class="modal fade" id="add-borrower">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add People</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="people_cat">Occupation</label>
                            <select class="form-control" name="people_cat" id="people_cat">
                                <option value="students">Student</option>
                                <option value="teachers">Teacher</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="student_teacher">Student's Teacher</label>
                            <select class="form-control" name="student_teacher" id="student_teacher">
                              <option value="">Select Teacher</option>
                                <?php
                                
                                  $query = "SELECT * FROM teachers WHERE teacher_exist='true'";
                                  $query_run = mysqli_query ($connection, $query);

                                  unset($teachers);
                                  while ($query_row = mysqli_fetch_assoc ($query_run))    $teachers[] = $query_row;
                        
                                  foreach ($teachers as $val)
                                  {
                                    if ($val['class_id'] != 0)
                                      echo '<option value="' . $val['teacher_id'] . '" class="' . $val['class_id'] . '">' . 
                                        $val['first_name'] . ' ' . $val['last_name'] . '</option>';
                                  }
                                
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="student_class">Class</label>
                            <select class="form-control" name="student_class" id="student_class">
                              <option value="0">Select Class</option>
                              <?php
                              
                                $query = "SELECT * FROM classes";
                                $query_run = mysqli_query($connection, $query);

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
                            <button type="submit" class="btn btn-primary add_people" name="submit" disabled="disabled">Add</button>
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



<script>
  
  $('#people_cat').change (function() {
    
    if ($('.form_control').parent('#add-borrower'))
      $('.form-control').parent('#add-borrower').removeAttr('disabled');

    var cat_no = $(this).children("option:selected").val();
    if (cat_no == 'teachers')
    {
      $('#student_teacher').attr('disabled', 'disabled');
      $('.add_people').removeAttr('disabled');
      $('.yes_teacher').hide();
    }
    else
    {
      $('#student_teacher').removeAttr('disabled');
      $('.add_people').attr('disabled', 'disabled');
      $('.yes_teacher').show();
    }

  });


// ------------------Class and Teacher onChange---------------

  $('#student_teacher').change (function() {
    $('#student_teacher option').removeAttr('selected');
    $('#student_class').val ( $(this).children('option:selected').attr('class') );


    // -------Check if val != 0-------
    if (($('#student_class').val() == '0'  ||  $(this).val() == '0')  &&  $('#people_cat').val() == 'students')
      $('.add_people').attr('disabled', 'disabled');
    else
      $('.add_people').removeAttr('disabled');

  });

  $('#student_class').change (function() {
    $('#student_teacher option').removeAttr('selected');

    if ($('#student_teacher option[class="' + $(this).val() + '"]').html() != undefined)
      $('#student_teacher option[class="' + $(this).val() + '"]').attr('selected', 'selected');
    else
      $('#student_teacher').val(0);

    // -------Check if val != 0-------

    if (($('#student_teacher').val() == '0'  ||  $(this).val() == '0')  &&  $('#people_cat').val() == 'students')
      $('.add_people').attr('disabled', 'disabled');
    else
      $('.add_people').removeAttr('disabled');

  });
</script>