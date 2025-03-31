<?php require_once('../init.php'); ?>
<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container 16.06.2022-->
  <?php include '../sidebar&navbar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <h1>Writed On&Off Books</h1>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3>Writed-On Books

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

          <!-- -----ADD------BOOK----------- -->
          <?php //include ("add_book_modal.php"); ?>
          
          <!-- --------BORROW-BOOK----------- -->
          <?php //include("borrow_book_modal.php"); ?>
          
          <!-- --------EDIT-BOOK----------- -->
          <?php include ("edit_book_modal.php"); ?>
          
        </div>

        <div class="card-body">
          <?php include 'checkboxes.php'; ?>
              <br><br>

        <!-- ------------Search-Book------------- -->
          <div class="row">
            <?php //include('../search_book_modal.php'); ?>
          </div>
          <!-- <div class="row" style="overflow: auto;"> -->
            <table id='example9' class='table table-bordered table-striped search_table' style='font-size:15px'>
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
                    <th>Publishers Supplier</th>
                    <th>School Name</th>
                    <th>Chapter</th>
                    <!-- <th>Nomeri</th> -->
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Total Cost</th>
                    <th>Write-On Date</th>
                    <th>Operations</th>
                </tr>
              </thead>
              <tbody>
                <?php

                  $query = "SELECT * FROM writed_on_books";
                  $query_run = mysqli_query ($connection, $query);

                  unset ($writedon_books);
                  while ($query_row = mysqli_fetch_assoc ($query_run))  $writedon_books[] = $query_row;

                  // $cats = array ("Okuw Kitap", "Çeper Eser", "Ýazuw Depder", "Mugallym Gollanma", "Prezidentiň Kitaby", "Zambak Kitap", "Başga Mekdepden Alynan Kitap");
                  $cats = array ("Schoolbook", "Literary Book", "Primaries Copybook", "Teachers Guide", "President Book", "Zambak Book", "Borrowed from Other Schools");
                  $students = array ("Elementary (1-4)", "Middle (5-10)", "High (11-12)");
                  foreach ($writedon_books as $won_book)
                  {
                    $diw = $won_book['book_id'];
                    $sql = "SELECT * FROM books WHERE book_id='$diw' AND book_exist='true'";
                    
                    unset ($books);
                    $books[] = mysqli_fetch_assoc (mysqli_query ($connection, $sql));
                    foreach ($books as $book)
                    {
                      echo '<tr>';
                      
                      echo "<td>" . $won_book['on_id'] . "</td>";
                      echo "<td>" . $book['book_subject'] . "</td>";
                      echo "<td>" . $cats[ $book['cat_id'] - 1] . "</td>";
                      echo "<td>";
                      if (!empty($book['book_serialnumber']))  echo "SN: " . $book['book_serialnumber'];
                      echo "</td>";
                      echo "<td>" . $book['book_name'] . "</td>";
                      echo "<td>" . $book['book_author'] . "</td>";
                      echo "<td>" . $book['book_year'] . "</td>";
                      echo "<td>" . $book['book_language'] . "</td>";
                      echo "<td>";
                      if (!empty($book['book_class']))  echo $book['book_class'];
                      echo "</td>";
                      echo "<td>";
                      if (!empty($book['student_cat']))  echo $students[ $book['student_cat'] - 1 ];
                      echo "</td>";
                      echo "<td>" . $book['book_edition'] . "</td>";
                      echo "<td>" . $book['book_school'] . "</td>";
                      echo "<td>";
                      if (!empty($book['book_chapter']))    echo $book['book_chapter'] . '<span>chapter</span>';
                      echo "</td>";
                      // echo "<td>";
                      // if (!empty($book['book_number']))    echo '№' . $book['book_number'];
                      // echo "</td>";
                      echo "<td>";
                      if (!empty($won_book['added_quantity']))  echo $won_book['added_quantity'];
                      echo "</td>";
                      echo "<td>" . $book['book_cost'] . " <span>manat</span></td>";
                      echo "<td>";
                      if (!empty($won_book['added_quantity'])  &&  !empty($book['book_cost']))  echo $book['book_cost'] * $won_book['added_quantity'] . " manat";
                      echo "</td>";
                      echo "<td>" . $won_book['writed_on_date'] . " </td>";
                      echo "<td>" . 
                      '<button type="button" class="btn btn-primary btn-sm edit_book" title="Edit" data-toggle="modal" data-target="#edit-book"><i class="fa fa-edit"></i></button>' . 
                      '<button type="button" class="btn btn-primary btn-sm remove_book" title="Delete"><i class="fa fa-trash"></i></button>';
                      echo '</td>';
                      
                      echo '</tr>';
                    }
                  }
                    
                ?>

              </tbody>
            </table>
          <!-- </div> -->
            
        </div>
        <?php require_once 'actions.php'; ?>

        <div class="ed_b"></div>

        <div class="card-footer">
        </div>

      </div>
      <!-- /.card -->

      <!-- Writed off books -->

      <?php include 'writed_off_books.php'; ?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../footer&scripts.php';?>
</div>


  <!-- <script>
    setTimeout(function(){
      $('#search_book').click();
    }, 500) 

    // ------------------------------Search-Book--------------------
    $('#search_book').click(function() {
      var checked = 0;
      if ($('#clear_history').is(':checked'))    $('.search_table *').remove(), checked = 1;

      setTimeout(function(){

        $.post ("../get_books.php", {
          book_category: $('#s-book_category:not([disabled])').val(),
          book_serialnumber: $('#s-book_serialnumber:not([disabled])').val(),
          book_name: $('#s-book_name:not([disabled])').val(),
          book_author: $('#s-book_author:not([disabled])').val(),
          book_year: $('#s-book_year:not([disabled])').val(),
          book_language: $('#s-book_language:not([disabled])').val(),
          book_subject: $('#s-book_subject:not([disabled])').val(),
          book_class: $('#s-book_class:not([disabled])').val(),
          student_cat: $('#s-student_cat:not([disabled])').val(),
          book_edition: $('#s-book_edition:not([disabled])').val(),
          book_school: $('#s-book_school:not([disabled])').val(),
          book_chapter: $('#s-book_chapter:not([disabled])').val(),
          book_quantity: $('#s-book_quantity:not([disabled])').val(),
          book_cost: $('#s-book_cost:not([disabled])').val(),
          book_number: $('#s-book_number:not([disabled])').val(),
          clear_history: checked
        }, function (data){
          $('.search_table').append(data)
          // alert(data)
        });
      }, 150) 

    });

    
  </script> -->
</body>
</html>
