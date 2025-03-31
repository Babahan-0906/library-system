<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3>Writed-Off Books

    <!-- -----------Print Table------------ -->
    <div class="row" style="float: right;">
      <button type="button" style="margin-left: 1px;" class="btn btn-primary" id="off_table2word">
            <i class="fa fa-file-word"></i> Word
      </button>
      <button type="button" style="margin-left: 2px;" class="btn btn-success" id="off_table2xls">
            <i class="fa fa-file-excel"></i> Excel(.xls)
      </button>
      <!-- -----------Dropdown Prints--------------- -->
      <div class="dropdown" style="margin-left: 2px;">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Other Formats
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <button type="button" class="dropdown-item" id="off_table2xlsx">
              <i class="fa fa-file-excel"></i> Excel(.xlsx)
          </button>
          <button type="button" class="dropdown-item" id="off_table2pdf">
              <i class="fa fa-file-pdf"></i> Pdf
          </button>
          <button type="button" class="dropdown-item" id="off_table2png">
              <i class="fa fa-image"></i> Png
          </button>
        </div>
      </div>
    </div>
    </h3>
    
  </div>

  <div class="card-body">
    <?php include 'checkboxes2.php'; ?>
        <br><br>

  <!-- ------------Search-Book------------- -->
    <div class="row">
      <?php //include('../search_book_modal.php'); ?>
    </div>
    <!-- <div class="row" style="overflow: auto;"> -->
      <table id='example10' class='table table-bordered table-striped search_table' style='font-size:15px'>
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
              <th>Writed-Off Quantity</th>
              <th>Cost</th>
              <th>Total Cost</th>
              <th>Writed-Off Date</th>
              <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php

            $query = "SELECT * FROM writed_off_books";
            $query_run = mysqli_query ($connection, $query);

            unset ($writedon_books);
            while ($query_row = mysqli_fetch_assoc ($query_run))  $writedon_books[] = $query_row;

            // $cats = array ("Okuw Kitap", "Çeper Eser", "Ýazuw Depder", "Mugallym Gollanma", "Prezidentiň Kitaby", "Zambak Kitap", "Başga Mekdepden Alynan Kitap");
            $cats = array ("Schoolbook", "Literary Book", "Primaries Copybook", "Teachers Guide", "President Book", "Zambak Book", "Borrowed from Other Schools");
            $students = array ("Elementary (1-4)", "Middle (5-10)", "High (11-12)");
            // $students = array ("Başlangyç (1-4)", "Orta (5-10)", "Uly (11-12)");
            foreach ($writedon_books as $won_book)
            {
              $diw = $won_book['book_id'];
              $sql = "SELECT * FROM books WHERE book_id='$diw'";
              
              unset ($books);
              $books[] = mysqli_fetch_assoc (mysqli_query ($connection, $sql));
              foreach ($books as $book)
              {
                echo '<tr>';
                
                echo "<td>" . $won_book['off_id'] . "</td>";
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
                echo "<td>" . $won_book['writed_off_date'] . " </td>";
                echo "<td>";
                  if ($book['cat_id'] != 2) echo '<button type="button" class="btn btn-primary btn-sm edit_off_book" title="Edit" data-toggle="modal" data-target="#edit-off-book"><i class="fa fa-edit"></i></button>';
                  echo '<button type="button" class="btn btn-primary btn-sm remove_off_book" title="Delete"><i class="fa fa-trash"></i></button>';
                echo '</td>';
                
                echo '</tr>';
              }
            }
              
          ?>

        </tbody>
      </table>
    <!-- </div> -->
      
  </div>

  <div class="ed_b"></div>

  <div class="card-footer">
  </div>

</div>
<!-- /.card -->