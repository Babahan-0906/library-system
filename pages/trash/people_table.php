<table id="example8" class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Deleted Date</th>
        <th>Teacher ID</th>
        <th>Student ID</th>
        <th>Occupation</th>
        <th>Class</th>
        <th>Borrower's Name</th>
        <th>Student's Teacher</th>
        <th>Operations</th>
    </tr>
    </thead>
    <tbody>

    <?php

        $count = 1;
        $people = [];

        // ------------------Teachers--------------------
        $query = "SELECT * FROM teachers WHERE teacher_exist='false'";
        $query_run = mysqli_query ($connection, $query);

        if (mysqli_num_rows ($query_run) > 0)
        {
            unset($teachers);
            while ($query_row = mysqli_fetch_assoc ($query_run))    $teachers[] = $query_row;

            foreach ($teachers as $teacher)
            {
                $zb = $teacher['class_id'];
                $query1 = "SELECT class_name FROM classes WHERE class_id='$zb'";
                $query_run1 = mysqli_fetch_assoc (mysqli_query ($connection, $query1))['class_name'];
                // echo $query_run1;

                $p_tr = '<tr>' .
                    '<td>' . $count . '.</td>' .
                    '<td>' . $teacher['removed_date'] . '</td>' .
                    '<td>' . $teacher['teacher_id'] . '</td>' .
                    '<td>-</td>' .
                    '<td>Mugallym</td>' .
                    '<td class_id="' . $teacher['class_id'] . '">' . $query_run1 . '</td>' .
                    '<td>' . $teacher['first_name'] . ' ' . $teacher['last_name'] . '</td>' .
                    '<td>-</td>' .
                    '<td><button type="button" class="btn btn-primary btn-sm undo_teacher"><i class="fa fa-undo" title="Restore"></i></button>' .
                        '<button type="button" class="btn btn-primary btn-sm remove_teacher" title="Delete"><i class="fa fa-trash"></i></button></td>' . 
                    '</tr>';

                $people[] = $p_tr;
                $count ++;
            }
        }


        // ------------------Students--------------------
        $query = "SELECT * FROM students WHERE student_exist='false'";
        $query_run = mysqli_query ($connection, $query);

        if (mysqli_num_rows ($query_run) > 0)
        {
            unset($students);
            while ($query_row = mysqli_fetch_assoc ($query_run))    $students[] = $query_row;
            
            foreach ($students as $student)
            {
                $zb = $student['class_id'];
                $query1 = "SELECT class_name FROM classes WHERE class_id='$zb'";
                $query_run1 = mysqli_fetch_assoc (mysqli_query ($connection, $query1))['class_name'];

                $zb = $student['teacher_id'];
                $query2 = "SELECT teacher_id, first_name, last_name FROM teachers WHERE teacher_id='$zb'";
                $query_run2 = array (mysqli_fetch_assoc (mysqli_query ($connection, $query2))['teacher_id'],
                    mysqli_fetch_assoc (mysqli_query ($connection, $query2))['first_name'], 
                    mysqli_fetch_assoc (mysqli_query ($connection, $query2))['last_name']);
                // echo $query_run1;

                $p_tr =  '<tr>' .
                    '<td>' . $count . '.</td>' .
                    '<td>' . $student['removed_date'] . '</td>' .
                    '<td>-</td>' .
                    '<td>' . $student['student_id'] . '</td>' .
                    '<td>Okuwçy</td>' .
                    '<td class_id="' . $student['class_id'] . '">' . $query_run1 . '</td>' .
                    '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>' .
                    '<td teacher_id="' . $query_run2[0] . '">' . $query_run2[1] . ' ' . $query_run2[2] . '</td>' .
                    '<td><button type="button" class="btn btn-primary btn-sm undo_student" title="Restore"><i class="fa fa-undo"></i></button>' .
                        '<button type="button" class="btn btn-primary btn-sm remove_student" title="Delete"><i class="fa fa-trash"></i></button></td>' . 
                    '</tr>';

                $people[] = $p_tr;
                $count ++;
            }
        }

        foreach ($people as $human)    echo $human;


    ?>

    </tbody>
</table>

<script>
    // ------------Undo People----------------
    
    $('.undo_teacher').click (function() {

        $.post ('undo_teacher.php', {
            teacher_id: $(this).parent().parent().children(':eq(2)').html()
        }, function (data) {
            console.log(data);
        })

        $('#example8').DataTable().row(this.parentElement.parentElement).remove().draw();
    })

    $('.undo_student').click (function() {

        $.post ('undo_student.php', {
            student_id: $(this).parent().parent().children(':eq(3)').html()
        }, function (data) {
            console.log(data);
        })

        $('#example8').DataTable().row(this.parentElement.parentElement).remove().draw();
    })

    // ----------------Remove People-----------------

    $('.remove_student').click (function() {

        $.post ('remove_student.php', {
            student_id: $(this).parent().parent().children(':eq(3)').html()
        }, function (data) {
            console.log(data);
        })

        $('#example8').DataTable().row(this.parentElement.parentElement).remove().draw();
    })

    $('.remove_teacher').click (function() {

        $.post ('remove_teacher.php', {
            teacher_id: $(this).parent().parent().children(':eq(2)').html()
        }, function (data) {
            console.log(data);
        })

        $('#example8').DataTable().row(this.parentElement.parentElement).remove().draw();
    })

</script>