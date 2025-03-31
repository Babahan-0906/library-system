<?php
  require_once '../init.php';

  $sql = "SELECT * FROM `returned_books` ORDER BY `return_id` ASC";
  $sql_run = mysqli_query ($connection, $sql);

  $bb = mysqli_fetch_assoc ($sql_run)['borrow_id'];

  $num = mysqli_num_rows ($sql_run);
  if ($num > 100)
  {
    $sql = "DELETE FROM returned_books ORDER BY return_id ASC LIMIT 1";
    mysqli_query ($connection, $sql);

    $qu = "SELECT borrow_id FROM returned_books WHERE borrow_id='$bb'";
    if (mysqli_num_rows (mysqli_query ($connection, $qu)) == 0)
    {
      $sql = "DELETE FROM borrowed_books WHERE borrow_id='$bb' AND book_quantity='0'";
      mysqli_query ($connection, $sql);
    }
  }

?>

<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">  

  <!-- Main Sidebar Container -->
  <?php include '../sidebar&navbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h1>Borrowed and Returned Books</h1>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <div class="card-header">
            <h3>Borrowed Books
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
            </h3>  
          </div>

          <div class="card-body">
            <div class="ed_bb"></div>

            
            <?php include 'checkboxes.php'; ?>
            <br>
            <?php include 'borrowed_books_table.php'; ?>
            
            <!-- ------------------Modals------------------ -->
            <?php include 'return_book_modal.php'; ?>
            <?php include 'edit_borrow_book_modal.php'; ?>
            <?php include 'actions.php'; ?>

          </div>
          <!-- /.card-body -->
          
          
          <div class="card-footer"></div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3>Returned Books
              <sup><small>(Last 100 shown)</small></sup>
              <!-- <sup><small>(Soňky 100 sanysy görkezilýär)</small></sup> -->

              <!-- -----------Print Table------------ -->
              <div class="row" style="float: right;">
                <button type="button" style="margin-left: 1px;" class="btn btn-primary" id="r_table2word">
                      <i class="fa fa-file-word"></i> Word
                </button>
                <button type="button" style="margin-left: 2px;" class="btn btn-success" id="r_table2xls">
                      <i class="fa fa-file-excel"></i> Excel(.xls)
                </button>
                <!-- -----------Dropdown Prints--------------- -->
                <div class="dropdown" style="margin-left: 2px;">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Other Formats
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button type="button" class="dropdown-item" id="r_table2xlsx">
                        <i class="fa fa-file-excel"></i> Excel(.xlsx)
                    </button>
                    <button type="button" class="dropdown-item" id="r_table2pdf">
                        <i class="fa fa-file-pdf"></i> Pdf
                    </button>
                    <button type="button" class="dropdown-item" id="r_table2png">
                        <i class="fa fa-image"></i> Png
                    </button>
                  </div>
                </div>
              </div>
            </h3>
          </div>
        <div class="card-body">
          <table id="example5" class="table table-striped">
                <thead style="font-size:13px">
                  <tr>
                    <th>ID</th>
                    <th>Borrower's Name</th>
                    <th>Grade</th>
                    <th>Occupation</th>
                    <th>Subject</th>
                    <!-- <th>Seriýa Nomeri</th> -->
                    <th>Book Title</th>
                    <th>Grade</th>
                    <th>Borrowed Date</th>
                    <th>Returned Date</th>
                    <th>Returned Quantity</th>
                    <th>Cost</th>
                    <th>Total Cost</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  
                    $query = "SELECT * FROM returned_books";
                    $query_run = mysqli_query ($connection, $query);

                    while ($query_row = mysqli_fetch_assoc ($query_run))    $returns[] = $query_row;

                    foreach ($returns as $return)
                    {
                      // --------------Get People Name--------------
                      $query = "SELECT * FROM borrowed_books WHERE borrow_id=" . $return['borrow_id'];
                      $borrower = mysqli_fetch_assoc (mysqli_query ($connection, $query));
                      
                      $sql = "SELECT class_id, first_name, last_name FROM ";
                      $p = 0;
                      
                      if (!empty ($borrower['student_id']))    $sql .= "students WHERE student_exist='true' AND student_id=" . $borrower['student_id'];
                      if (!empty ($borrower['teacher_id']))    { $sql .= "teachers WHERE teacher_exist='true' AND teacher_id=" . $borrower['teacher_id']; $p = 1; }
                      
                      $sql_run = mysqli_query ($connection, $sql);
                      if (mysqli_num_rows ($sql_run) > 0)
                      {
                        
                        $query = "SELECT * FROM books WHERE book_id=" . $borrower['book_id'] . " AND book_exist='true'";
                        if (mysqli_num_rows (mysqli_query ($connection, $query)) > 0)
                        {
                          echo '<tr>';
                          echo '<td>' . $return['return_id'] . '</td>';
                          

                          $sql_row = mysqli_fetch_assoc ($sql_run);
                          echo '<td>' . $sql_row['first_name'] . ' ' . $sql_row['last_name'] . '</td>';

                          // -------------Get People Class-------------

                          $query = "SELECT class_name FROM classes WHERE class_id=" . $sql_row['class_id'];
                          echo '<td>' . mysqli_fetch_assoc (mysqli_query ($connection, $query))['class_name'] . '</td>';
                          

                          // -------------------People-Cat-----------------

                          echo '<td>';
                            if ($p == 0)    echo 'Student';
                            else    echo 'Teacher';
                          echo '</td>';

                          unset ($book);
                          $query = "SELECT * FROM books WHERE book_id=" . $borrower['book_id'] . " AND book_exist='true'";
                          $book = mysqli_fetch_assoc (mysqli_query ($connection, $query));
                          

                          // --------------Get-Book---------------------------
                          
                          echo "<td>" . $book['book_subject'] . "</td>";
                          // echo "<td>SN: " . $book['book_serialnumber'] . "</td>";
                          echo "<td>" . $book['book_name'] . "</td>";
                          echo "<td>";
                              if (!empty($book['book_class']))  echo $book['book_class'];
                          echo "</td>";
                          echo "<td>" . $borrower['borrow_date'] . '</td>';
                          echo "<td>" . $return['return_date'] . '</td>';
                          echo '<td>' . $return['book_quantity'] . " book</td>";
                          echo "<td>" . $book['book_cost'] . " manat</td>";
                          echo '<td>' . $book['book_cost'] * $return['book_quantity'] . " manat" . "</td></tr>";
                        }
                      }
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../footer&scripts.php'; ?>
    </div>
    

</body>
</html>
