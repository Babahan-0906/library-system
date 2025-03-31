<?php require_once '../init.php'; ?>
<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Main Sidebar Container -->
  <?php include '../sidebar&navbar.php' ?>

  <?php
  
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
            header("location: grades.php");
          }
          else  echo '<script>Swal.fire ("Do not add the same class!", "", "warning");</script>';
        }
        else
        {
          echo '<script>Swal.fire ("Class name format must be like this: <i>1-abcdeqfghij`</i>!", "", "warning");</script>';
        }
      }

    }
  
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
                <div class="col-sm-3">
                    <h1>Classes</h1>
            </div>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-class">
              Add Class
            </button>
            <button type="button" style="float: right;" class="btn btn-danger" id="deleteAll">
              Delete All People
            </button>


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
                          <label for="class_name">Example: <i>1-abcde (ç=c, ž=`, ä=q)</i></label>
                          <input type="text" class="form-control" name="class_name" id="class_name" placeholder="Add Class">
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit_class">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        
                      </div>
                    </form>
                  </div>

                </div>
              </div>
            </div>
          </div>

        <div class="card-body">
          <table id="example6" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Class Name</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                      $query = "SELECT * FROM classes";
                      $query_run = mysqli_query ($connection, $query);

                      while ($query_row = mysqli_fetch_assoc ($query_run))    $classes[] = $query_row;

                      foreach ($classes as $class)
                      {
                        echo '<tr>';
                          echo '<td>' . $class['class_id'] . '</td>';
                          echo '<td>' . $class['class_name'] . '</td>';
                          echo '<td><button type="button" title="Edit Class" class="btn btn-primary btn-sm edit_grade" data-toggle="modal" data-target="#edit-grade"><i class="fa fa-edit"></i></button></td>';
                        echo '</tr>';
                      }

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

      <?php require_once 'edit_grade_modal.php'; ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../footer&scripts.php'; ?>
    </div>

    <script>
      $('#deleteAll').click (function() {

        Swal.fire({  
          title: 'Delete All?',
          text: 'All Students, Teachers and Classes will be deleted! If there are borrowed books, return them, then delete!',
          // text: 'Ähli Okuwçylar, Mugallymlar, Synplar öçüriler! Eger Kitap Karzyna Berilen Bolsa, Yzyna Alyp Soň Öçüriň!',
          // showDenyButton: true,
          icon: 'error',
          showCancelButton: true,  
          confirmButtonText: `Delete`,  
          cancelButtonText: `Cancel`,
        }).then((result) => {  
          /* Read more about isConfirmed, isDenied below */  
          if (result.value == true) {

            $.post("removeAllPeople.php", {
              yes: 1
            }, function(data){
              console.log(data);
            })

            Swal.fire('All Deleted!', '', 'success');
            window.location.href = window.location.href;
          } 
        });

      });
    </script>

</body>
</html>
