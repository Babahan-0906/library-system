<?php  require_once('../init.php'); ?>
<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Main Sidebar Container -->
  <?php include '../sidebar&navbar.php' ?>
  <?php

    // ADD------CLASS
    if (isset ($_POST['submit_class']))
    {
      $class_name = $_POST['class_name'];
      $class = explode('-', $class_name);
      $str = $class[1];
      $date = date('Y');

      // $str .= 'a';
      for ($i=0; $i<strlen ($str); $i++)
      {
        $char = $str[$i];
        if (ctype_alpha ($char)  || $char == '`' || $char == '[' || $char == ']' || $char == "'\'")
        {
          $char = strtoupper ($char);
          if ($char == '`')   $char = 'Ž';
          else if ($char == 'Q')   $char = 'Ä';
          else if ($char == '{')   $char = 'Ň';
          else if ($char == '}')   $char = 'Ö';
          else if ($char == '|')   $char = 'Ş';
          else if ($char == 'X')   $char = 'Ü';
          else if ($char == 'C')   $char = 'Ç';
          else if ($char == 'V')   $char = 'Ý';

          $query = "SELECT * FROM classes WHERE class_name='$class[0]-$char' AND added_year='$date'";
          if (mysqli_num_rows (mysqli_query ($connection, $query)) == 0)
          {
            $query = "INSERT INTO classes SET class_name='$class[0]-$char', added_year='$date'";
            mysqli_query($connection, $query);
            // echo '<script>console.log("' . $query . '");</script>';
            header("location: people.php");
          }
          else  echo '<script>Swal.fire ("Class Name Already Exists!", "", "warning");</script>';
        }
        else
        {
          echo '<script>Swal.fire ("Class name should be in this format <i>1-abcdeqfghij`</i>!", "", "warning");</script>';
        }
      }

    }

    // ADD-------PEOPLE

    if (isset ($_POST['submit']))
    {
      $people_cat = $_POST['people_cat']; 
      $class = $_POST['student_class'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      if (isset ($_POST['student_teacher']))    $teacher = $_POST['student_teacher'];

      $query = "INSERT INTO ";
      if ($people_cat == 'students')    $query = $query . "students SET teacher_id='$teacher', class_id='$class', first_name='$first_name', last_name='$last_name', student_exist='true'";
      else    $query = $query . "teachers SET class_id='$class', first_name='$first_name', last_name='$last_name', teacher_exist='true'";

      mysqli_query($connection, $query);
      header("location: people.php");
    }
  
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
                <div class="col-sm-3">
                    <h1>People</h1>
            </div>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-borrower">
                  Add People
            </button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-class">
                  Add Class
            </button>
            
            <!-- -----------Print Table------------ -->
            <div class="row" style="float: right;">
              <button type="button" style="margin-left: 1px;" class="btn btn-primary" id="table2word">
                    <i class="fa fa-file-word"></i> Word
              </button>
              <button type="button" style="margin-left: 2px;" class="btn btn-success" id="table2xls">
                    <i class="fa fa-file-excel"></i> Excel(.xls)
              </button>
              <!-- -----------Dropdown Prints--------------- -->
              <div class="dropdown" style="margin-left: 2px;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Other Formats
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button type="button" class="dropdown-item" id="table2xlsx">
                      <i class="fa fa-file-excel"></i> Excel(.xlsx)
                  </button>
                  <button type="button" class="dropdown-item" id="table2pdf">
                      <i class="fa fa-file-pdf"></i> Pdf
                  </button>
                  <button type="button" class="dropdown-item" id="table2png">
                      <i class="fa fa-image"></i> Png
                  </button>
                </div>
              </div>
            </div>

            <!-- ----------ADD------------CLASS---------- -->
            <div class="modal fade" id="add-class">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <h4 class="modal-title">Add Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" role="form">
                      <div class="card-body">

                        <div class="form-group">
                          <label for="class_name">Example: <i>1-abcde</i></label>
                          <input type="text" class="form-control" name="class_name" id="class_name" placeholder="Class Name">
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit_class">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>

            <!-- ----------MODALS---------- -->
            <?php require_once 'add_people_modal.php';  ?>
            <?php require_once 'borrow_book_modal.php';  ?>
            <?php require_once 'edit_people_modal.php';  ?>
            
          </div>
        <div class="card-body">
          <table id="example2" class="table table-striped">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Teacher ID</th>
                    <th>Student ID</th>
                    <th>Occupation</th>
                    <th>Class</th>
                    <th>First and Last Name</th>
                    <th>Student's Teacher</th>
                    <th>Operations</th>
                </tr>
              </thead>
              <tbody>

                <?php

                  $count = 1;
                  $people = [];

                  // ------------------Teachers--------------------

                  foreach ($teachers as $teacher)
                  {
                    $zb = $teacher['class_id'];
                    $query1 = "SELECT class_name FROM classes WHERE class_id='$zb'";
                    $query_run1 = mysqli_fetch_assoc (mysqli_query ($connection, $query1))['class_name'];
                    // echo $query_run1;

                    $p_tr = '<tr>' .
                        '<td>' . $count . '.</td>' .
                        '<td>' . $teacher['teacher_id'] . '</td>' .
                        '<td>-</td>' .
                        '<td>Teacher</td>' .
                        '<td class_id="' . $teacher['class_id'] . '">' . $query_run1 . '</td>' .
                        '<td>' . $teacher['first_name'] . ' ' . $teacher['last_name'] . '</td>' .
                        '<td>-</td>' .
                        '<td><button type="button" class="btn btn-primary btn-sm edit_people" title="Edit" data-toggle="modal" data-target="#edit-borrower"><i class="fa fa-edit"></i></button>' .
                          '<button type="button" class="btn btn-primary btn-sm borrow_book" title="Borrow" data-toggle="modal" data-target="#borrow-book"><i class="fa fa-book"></i></button>' . 
                          '<button type="button" class="btn btn-primary btn-sm remove_people" title="Delete"><i class="fa fa-trash"></i></button> </td>' .
                      '</tr>';

                    $people[] = $p_tr;
                    $count ++;
                  }

                  // ------------------Students--------------------
                  
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
                        '<td>-</td>' .
                        '<td>' . $student['student_id'] . '</td>' .
                        '<td>Student</td>' .
                        '<td class_id="' . $student['class_id'] . '">' . $query_run1 . '</td>' .
                        '<td>' . $student['first_name'] . ' ' . $student['last_name'] . '</td>' .
                        '<td teacher_id="' . $query_run2[0] . '">' . $query_run2[1] . ' ' . $query_run2[2] . '</td>' .
                        '<td><button type="button" class="btn btn-primary btn-sm edit_people" title="Edit" data-toggle="modal" data-target="#edit-borrower"><i class="fa fa-edit"></i></button>' .
                          '<button type="button" class="btn btn-primary btn-sm borrow_book" title="Borrow" data-toggle="modal" data-target="#borrow-book"><i class="fa fa-book"></i></button>' . 
                          '<button type="button" title="Delete" class="btn btn-primary btn-sm remove_people"><i class="fa fa-trash"></i></button> </td>' .
                      '</tr>';

                    $people[] = $p_tr;
                    $count ++;
                  }

                  foreach ($people as $human)    echo $human;


                ?>

              </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
      
      <?php include 'actions.php'; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../footer&scripts.php'; ?>
    </div>
</body>
</html>
