<?php require_once('../init.php'); ?>
<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container 16.06.2022-->
  <?php include '../sidebar&navbar.php'; ?>

  <?php

    if (isset ($_POST['submit']))
    {
      $book_id = NULL;
      $cat_id = $_POST['book_category'];
      $book_serialnumber = NULL;
      $book_name = NULL;
      $book_author = NULL;
      $book_year = NULL;
      $book_language = NULL;
      $book_subject = NULL;
      $book_class = NULL;
      $book_edition = NULL;
      $student_cat = NULL;
      $book_school = NULL;
      $book_chapter = NULL;
      $book_quantity = NULL;
      $book_cost = NULL;
      // $book_number = NULL;
      $book_exist = 'true';
      $writed_on_date = $_POST['writed_on_date'];

      // echo $cat_id;
      if ($cat_id == 2)
      {
        $book_serialnumber = $_POST['book_serialnumber'];
        $book_name = $_POST['book_name'];
        $book_author = $_POST['book_author'];
        $book_year = $_POST['book_year'];
        $book_language = $_POST['book_language'];
        // $book_subject = $_POST['book_subject'];
        // $book_class = $_POST['book_class'];
        $student_cat = $_POST['student_cat'];
        $book_edition = $_POST['book_edition'];
        // $book_school = $_POST['book_school'];
        // $book_chapter = $_POST['book_chapter'];
        $book_quantity = $_POST['book_quantity'];
        $book_cost = $_POST['book_cost'];
        // $book_number = $_POST['book_number'];

        $sn = explode (' ', $book_serialnumber);
        $query = "INSERT INTO books (cat_id, book_serialnumber, book_name, book_author, book_year, book_language, student_cat, book_edition, book_quantity, book_cost, book_exist, writed_on_date) VALUES ";
        $query2 = "SELECT book_serialnumber FROM books WHERE (";

        $query3 = "SELECT book_id FROM books WHERE cat_id='2' AND ";
        for ($i=0; $i<sizeof ($sn); $i++)
        {
          if (!empty($sn[$i][0]))
          {
            $query .= "('$cat_id', '$sn[$i]', '$book_name', '$book_author', '$book_year', '$book_language', '$student_cat', '$book_edition', '$book_quantity', '$book_cost', 'true', '$writed_on_date'), ";
            $query2 .= "book_serialnumber='$sn[$i]' OR ";
          }
        }
        $query = substr ($query, 0, strlen ($query) - 2);
        $query2 = substr ($query2, 0, strlen ($query2) - 4);
        $query2 .= ") AND book_name='$book_name' AND book_author='$book_author' AND book_year='$book_year' AND book_language='$book_language' AND student_cat='$student_cat' AND book_edition='$book_edition' AND CAST(book_cost AS DECIMAL(7,4))=CAST('$book_cost' AS DECIMAL(7,4)) AND book_exist='true'";
        $query3 .= "book_name='$book_name' AND book_author='$book_author' AND book_year='$book_year' AND book_language='$book_language' AND student_cat='$student_cat' AND book_edition='$book_edition' AND CAST(book_cost AS DECIMAL(7,4))=CAST('$book_cost' AS DECIMAL(7,4)) AND book_exist='true'";
        
        echo '<script>console.log("' . $query . '")</script>';
        // mysqli_query ($connection, $query);
        // $query = "";
        // $query2 = "";

        // header("location: books.php"); 
      }
      else
      {
        $query = "INSERT INTO books SET ";
        $query2 = "SELECT * FROM books WHERE ";
        if (isset ($_POST['book_category']))   {   $cat_id = $_POST['book_category'];     $query = $query . "cat_id='$cat_id', ";   $query2 = $query2 . "cat_id='$cat_id' AND ";  }
        // if (isset ($_POST['book_serialnumber']))    {   $book_serialnumber = $_POST['book_serialnumber'];     $query = $query . "book_serialnumber='$book_serialnumber', ";  }
        if (isset ($_POST['book_name']))    {   $book_name = $_POST['book_name'];     $query = $query . "book_name='$book_name', ";   $query2 = $query2 . "book_name='$book_name' AND ";  }
        if (isset ($_POST['book_author']))    {   $book_author = $_POST['book_author'];     $query = $query . "book_author='$book_author', ";   $query2 = $query2 . "book_author='$book_author' AND ";  }
        if (isset ($_POST['book_year']))    {   $book_year = $_POST['book_year'];     $query = $query . "book_year='$book_year', ";   $query2 = $query2 . "book_year='$book_year' AND ";  }
        if (isset ($_POST['book_language']))    {   $book_language = $_POST['book_language'];     $query = $query . "book_language='$book_language', ";   $query2 = $query2 . "book_language='$book_language' AND ";  }
        if (isset ($_POST['book_subject']))   {   $book_subject = $_POST['book_subject'];     $query = $query . "book_subject='$book_subject', ";   $query2 = $query2 . "book_subject='$book_subject' AND ";  }
        if (isset ($_POST['book_class']))   {   $book_class = $_POST['book_class'];     $query = $query . "book_class='$book_class', ";   $query2 = $query2 . "book_class='$book_class' AND ";  }
        if (isset ($_POST['student_cat']))    {   $student_cat = $_POST['student_cat'];     $query = $query . "student_cat='$student_cat', ";   $query2 = $query2 . "student_cat='$student_cat' AND ";  }
        if (isset ($_POST['book_edition']))   {   $book_edition = $_POST['book_edition'];     $query = $query . "book_edition='$book_edition', ";   $query2 = $query2 . "book_edition='$book_edition' AND ";  }
        if (isset ($_POST['book_school']))    {   $book_school = $_POST['book_school'];     $query = $query . "book_school='$book_school', ";   $query2 = $query2 . "book_school='$book_school' AND ";  }
        if (isset ($_POST['book_chapter']))  {   $book_chapter = $_POST['book_chapter'];     $query = $query . "book_chapter='$book_chapter', ";   $query2 = $query2 . "book_chapter='$book_chapter' AND ";  }
        if (isset ($_POST['book_quantity']))    {   $book_quantity = $_POST['book_quantity'];     $query = $query . "book_quantity='$book_quantity', ";  }//$query2 = $query2 . "book_quantity='$book_quantity' AND ";  }
        if (isset ($_POST['book_cost']))    {   $book_cost = $_POST['book_cost'];     $query = $query . "book_cost='$book_cost', ";   $query2 = $query2 . "CAST(book_cost AS DECIMAL(7,4))=CAST('$book_cost' AS DECIMAL(7,4))";  }
        // if (isset ($_POST['book_cost']))    {   $book_cost = $_POST['book_cost'];     $query = $query . "book_cost='$book_cost', ";   $query2 = $query2 . "CAST(book_cost AS DECIMAL(7,4))=CAST('$book_cost' AS DECIMAL(7,4)) AND ";  }
        // if (isset ($_POST['book_number']))    {   $book_number = $_POST['book_number'];     $query = $query . "book_number='$book_number', ";   $query2 = $query2 . "book_number='$book_number' AND ";  }

        $query = $query . "book_exist='$book_exist', writed_on_date='$writed_on_date'";
        // $query2 = $query2 . "book_exist='$book_exist'";
      
      }
      
      echo '<script>console.log("' . $query2 . '")</script>';
      // --------Check wether it is duplicate---------
      $run = mysqli_query ($connection, $query2);
      $brow = mysqli_fetch_assoc ($run);
      if (mysqli_num_rows ($run) == 0) {
        mysqli_query ($connection, $query);

        // --------- Update book_quantity of new added 'ceper esers'--------
        if ($cat_id == 2)
        {
          echo '<script>console.log("' . $query3 . '")</script>';
          $rn = mysqli_query ($connection, $query3);
          $bquan = mysqli_num_rows ($rn);

          $bid = "";
          while ($rw = mysqli_fetch_assoc ($rn))  $bid .= "book_id='" . $rw['book_id'] . "' OR ";
          $bid = substr ($bid, 0, strlen ($bid) - 4);
          $nsql = "UPDATE books SET book_quantity='$bquan' WHERE " . $bid;
          echo '<script>console.log("' . $nsql . '")</script>';
          mysqli_query ($connection, $nsql);

        }
        $query = "";
        $query2 = "";
        $query3 = "";
        header ("location: books.php"); 
      }
      else
      {
        // If this is 'ceper eser' then, 
        if ($cat_id == 2)
        {
          $sn = "";
          $sn .= $brow['book_serialnumber'];
          while ($row = mysqli_fetch_assoc ($run))   $sn .= $row['book_serialnumber'] . ',';

          $str = "Swal.fire ({
            icon: 'warning', 
            text: '" . $sn . " serial numbered book(s) already exist(s). Please change!',
            // text: '" . $sn . " seriýa nomerli kitap bar. Üýtgetmegiňizi haýyş edýäs!',
            confirmButtonText: 'Ok'
          })";
          echo "<script>";
          echo $str;
          echo "</script>";
        }
        else if ($cat_id == '7')
        {
          $str = "Swal.fire ('A book like this already exists in library!', '', 'warning')";
          // $str = "Swal.fire ('Şuňa meňzeş kitap kitaphanada bar!', '', 'warning')";
          echo "<script>";
          echo $str;
          echo "</script>";
        }
        else
        {
          // echo '<script>console.log("' . mysqli_num_rows(mysqli_query($connection, $query2)) . '")</script>';
          $str = "Swal.fire({
            icon: 'warning',
            // title: 'Şuňa meňzeş kitap kitaphanada bar',
            title: 'A book like this already exists in library!',
            text: 'Do you want to write_on this book or press *Don't add*!',
            // text: 'Kitaby hasabyňyza goşjakmy ýa-da ýalňyşyp goşan bolsaňyz *Ýalňyşdym* düwmäni basyň!',
            showCancelButton: true,  
            confirmButtonText: `Write On`,  
            cancelButtonText: `Don't`
          }).then((result) => {
            if (result.value == true)
            {
              $.post ('write_on_book.php', {
                book_id: " . $brow['book_id'] . ",
                book_quantity: " . $brow['book_quantity'] . ",
                added_quantity: " . $book_quantity . ",
                writed_on_date: '" . $writed_on_date . "'
              }, function(data) {
                console.log(data);
                if (data == '11')
                {
                  Swal.fire('Book Has Been Writed On!', '', 'success');
                  window.location.href = window.location.href;
                }
                else
                {
                  Swal.fire('Sorry, something went wrong!', '', 'error');
                }
              });
            }
          })";
          echo "<script>";
          echo $str;
          echo "</script>";
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
                    <h1>Books</h1>
            </div>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-book">
                Add Book
          </button>
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add-log">
                Add Log
          </button>

          <!-- -----------Print Table------------ -->
          <div class="row" style="float: right;">
            <!-- -----------Dropdown Prints--------------- -->
            <a type="button" href="../print-report/print_report.php" target="_blank">
              <button type="button" style="width: 100%; margin-top: 1px;" class="btn btn-info" formtarget="_blank">
                    <i class="fa fa-print"></i> Print Report
              </button>
            </a>

            <div class="dropdown" style="margin-left: 2px;">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Other Formats
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button type="button" style="width: 100%; margin-top: 1px;" class="btn btn-primary" id="table2word">
                      <i class="fa fa-file-word"></i> Word
                </button>
                <button type="button" style="width: 100%; margin-top: 1px;" class="btn btn-success" id="table2xls">
                      <i class="fa fa-file-excel"></i> Excel(.xls)
                </button>
                <button type="button" style="width: 100%; margin-top: 1px;" class="btn btn-warning" id="table2pdf">
                    <i class="fa fa-file-pdf"></i> Pdf
                </button>
                <button type="button" style="width: 100%; margin-top: 2px;" class="btn btn-success" id="table2xlsx">
                    <i class="fa fa-file-excel"></i> Excel(.xlsx)
                </button>
                <button type="button" style="width: 100%; margin-top: 2px;" class="btn btn-danger" id="table2png">
                    <i class="fa fa-image"></i> Png
                </button>
              </div>
            </div>
          </div>

          <!-- -----ADD------BOOK----------- -->
          <?php include ("add_book_modal.php"); ?>
          
          <!-- --------BORROW-BOOK----------- -->
          <?php include("borrow_book_modal.php"); ?>
          
          <!-- --------EDIT-BOOK----------- -->
          <?php include ("edit_book_modal.php"); ?>

          <!-- --------WRITE-OFF-BOOK----------- -->
          <?php include ("write_off_book_modal.php"); ?>

          <!-- -----ADD-LOG----------- -->
          <?php include ("school_logs_modal.php"); ?>
          
        </div>

        <div class="card-body">
          <?php include 'checkboxes.php'; ?>
              <br><br>
              
          <?php
            $sql = "SELECT * FROM books WHERE book_exist='true' ORDER BY cat_id, book_name,";
            $sql .= " book_author, book_year, book_language, book_subject, book_class,";
            $sql .= " student_cat, book_edition, book_school, book_chapter, book_quantity, book_cost ASC";
            
            $run = mysqli_query ($connection, $sql);
            unset ($books);
            
            // -----------Get number of all books------------
            while ($row = mysqli_fetch_assoc ($run))    $books[] = $row;

            $book_num = 0;
            $book_cost = 0;
            for ($i=0; $i<sizeof ($books) - 1; $i++)
            {
              if (
                $books[$i]['cat_id'] == $books[$i + 1]['cat_id']  &&  
                $books[$i]['book_name'] == $books[$i + 1]['book_name']  &&  
                $books[$i]['book_author'] == $books[$i + 1]['book_author']  &&  
                $books[$i]['book_year'] == $books[$i + 1]['book_year']  &&  
                $books[$i]['book_language'] == $books[$i + 1]['book_language']  &&  
                $books[$i]['book_subject'] == $books[$i + 1]['book_subject']  &&  
                $books[$i]['book_class'] == $books[$i + 1]['book_class']  &&  
                $books[$i]['student_cat'] == $books[$i + 1]['student_cat']  &&  
                $books[$i]['book_edition'] == $books[$i + 1]['book_edition']  &&  
                $books[$i]['book_school'] == $books[$i + 1]['book_school']  &&  
                $books[$i]['book_chapter'] == $books[$i + 1]['book_chapter']  &&  
                $books[$i]['book_quantity'] == $books[$i + 1]['book_quantity']  &&  
                $books[$i]['book_cost'] == $books[$i + 1]['book_cost']
              ) { continue; }
              else
              {
                $book_num += $books[$i]['book_quantity'];
                $book_cost += $books[$i]['book_quantity'] * $books[$i]['book_cost'];
              }
            }
            $book_num += $books[sizeof ($books) - 1]['book_quantity'];
            $book_cost += $books[sizeof ($books) - 1]['book_quantity'] * $books[sizeof ($books) - 1]['book_cost'];
            
            // -----------Get number of give books---------

            $sql = "SELECT book_quantity FROM borrowed_books";
            $run = mysqli_query ($connection, $sql);
            $borrowed_num = 0;
            while ($row = mysqli_fetch_assoc ($run))  $borrowed_num += $row['book_quantity'];

            echo '<strong>In Library:</strong> Total <i>' . $book_num . '</i> Book(s) | <i>' . $book_cost . '</i> Manat <br>';
            echo '<strong>At Teacher(s) or Pupil(s):</strong> Total <i>' . $borrowed_num . '</i> Book(s) <br>';
            echo '<strong>Left: </strong><i>' . ($book_num - $borrowed_num) .'</i> Book(s)';

          ?> <br><br>
        <!-- ------------Search-Book------------- -->
          <div class="row">
            <?php //include('../search_book_modal.php'); ?>
          </div>
          <!-- <div class="row" style="overflow: auto;"> --> <!-- display nowrap  -->

            <table id='example1' class='table table-bordered table-striped search_table' style='font-size:15px'>
              <!-- <caption style="caption-side: top">Kitaplar akjshd alkjsh dlkajhs dklajhs dlkajsh dlakjsh dklajsh dkljahs lk jh</caption>   -->
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
                    <th>Added Date</th>
                    <th>Operations</th>
                </tr>
              </thead>
              <tbody>
                <?php

                  $query = "SELECT * FROM books WHERE book_exist='true' AND book_quantity>0";
                  $query_run = mysqli_query ($connection, $query);

                  unset ($books);
                  while ($query_row = mysqli_fetch_assoc ($query_run))    $books[] = $query_row;

                  $cats = array ("Schoolbook", "Literary Book", "Primaries Copybook", "Teachers Guide", "President Book", "Zambak Book", "Borrowed from Other Schools");
                  $students = array ("Elementary (1-4)", "Middle (5-10)", "High (11-12)");
                  foreach ($books as $book)
                  {
                    echo '<tr>';

                      echo '<td>' . $book['book_id'] . "</td>";
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
                        if (!empty($book['book_class']))  echo $book['book_class'] . " <span></span>";
                      echo "</td>";
                      echo "<td>";
                        if (!empty($book['student_cat']))  echo $students[ $book['student_cat'] - 1 ] . " <span>grade</span>";
                      echo "</td>";
                      echo "<td>" . $book['book_edition'] . "</td>";
                      echo "<td>" . $book['book_school'] . "</td>";
                      echo "<td>";
                        if (!empty($book['book_chapter']))    echo $book['book_chapter'] . '<span>chapter</span>';
                      echo "</td>";
                      // echo "<td>";
                      //   if (!empty($book['book_number']))    echo '№' . $book['book_number'];
                      // echo "</td>";
                      echo "<td>";
                        if (!empty($book['book_quantity']))  echo $book['book_quantity'] . " <span></span>";
                      echo "</td>";
                      echo "<td>" . $book['book_cost'] . " <span>manat</span></td>";
                      echo "<td>";
                        if (!empty($book['book_quantity'])  &&  !empty($book['book_cost']))  echo $book['book_cost'] * $book['book_quantity'] . " manat";
                      echo "</td>";
                      echo "<td>" . $book['writed_on_date'] . " </td>";
                      echo "<td>" . 
                          '<button type="button" class="btn btn-primary btn-sm borrow_book" title="Borrow" data-toggle="modal" data-target="#borrow-book"><i class="fa fa-book"></i></button>' . 
                          '<button type="button" class="btn btn-primary btn-sm edit_book" title="Edit" data-toggle="modal" data-target="#edit-book"><i class="fa fa-edit"></i></button>';
                          if ($book['cat_id'] == 2  &&  $book['cat_id'] != 7) echo '<button type="button" book_quantity="1" class="btn btn-primary btn-sm write-off-book" title="Write Off" data-toggle="modal" data-target="#write-off-book"><i style="transform: rotate(90deg) scaleX(-1);" class="nav-icon fa fa-exchange-alt"></i></button>';
                          else if ($book['cat_id'] != 7)   echo '<button type="button" book_quantity="' . $book['book_quantity'] . '" class="btn btn-primary btn-sm write-off-book" title="Write Off" data-toggle="modal" data-target="#write-off-book"><i style="transform: rotate(90deg) scaleX(-1);" class="nav-icon fa fa-exchange-alt"></i></button>';
                          else if ($book['cat_id'] == 7)  echo '<button type="button" class="btn btn-primary btn-sm remove_book" title="Delete"><i class="fa fa-trash"></i></button>';
                      echo '</td>';

                    echo '</tr>';
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
