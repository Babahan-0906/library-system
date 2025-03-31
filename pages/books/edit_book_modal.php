<div class="modal fade" id="edit-book">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_book_category">Book Category</label>
                                    <select class="form-control" name="e_book_category" id="e_book_category">
                                        <!-- <option value="0">Kitap Kategoriýasy</option> -->
                                        <!-- <option value="0">Book Category</option> -->
                                        <option value="1">Schoolbook</option>
                                        <option value="2">Literary Book</option>
                                        <option value="3">Primaries Copybook</option>
                                        <option value="4">Teachers Guide</option>
                                        <option value="5">President Book</option>
                                        <option value="6">Zambak Book</option>
                                        <option value="7">Borrowed from Other Schools</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="e_book_id">Book ID</label>
                                    <input type="number" class="form-control" name="e_book_id" id="e_book_id" placeholder="Book ID" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="e_book_serialnumber">Serial Number</label>
                                    <input type="text" class="form-control" min=1 name="e_book_serialnumber" id="e_book_serialnumber" placeholder="Serial Number">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_name">Book Title</label>
                                    <input type="text" class="form-control" name="e_book_name" id="e_book_name" placeholder="Book Title">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_author">Author</label>
                                    <input type="text" class="form-control" name="e_book_author" id="e_book_author" placeholder="Author">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_year">Published Year</label>
                                    <input type="text" class="form-control" name="e_book_year" id="e_book_year" placeholder="Published Year">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_language">Language</label>
                                    <input type="text" class="form-control" name="e_book_language" id="e_book_language" placeholder="Language">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_subject">Subject</label>
                                    <input type="text" class="form-control" name="e_book_subject" id="e_book_subject" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_class">Grade</label>
                                    <select class="form-control" name="e_book_class" id="e_book_class">
                                    <option value="">Grade</option>
                                        <option value="1st grade">1</option>
                                        <option value="2nd grade">2</option>
                                        <option value="3rd grade">3</option>
                                        <option value="4th grade">4</option>
                                        <option value="5th grade">5</option>
                                        <option value="6th grade">6</option>
                                        <option value="7th grade">7</option>
                                        <option value="8th grade">8</option>
                                        <option value="8th grade (2006)">8 (2006)</option>
                                        <option value="9th grade">9</option>
                                        <option value="9th grade (2006)">9 (2006)</option>
                                        <option value="10th grade">10</option>
                                        <option value="10th grade (2006)">10 (2006)</option>
                                        <option value="11th grade">11</option>
                                        <option value="11th grade (2006)">11 (2006)</option>
                                        <option value="12th grade">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="e_student_cat">Student Category</label>
                                    <select class="form-control" name="e_student_cat" id="e_student_cat" required>
                                        <option value="">Student Category</option>
                                        <option value="1">Elementary (1-4)</option>
                                        <option value="2">Middle (5-10)</option>
                                        <option value="3">High (11-12)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="e_book_edition">Publishers Supplier</label>
                                    <input type="text" class="form-control" name="e_book_edition" id="e_book_edition" placeholder="Publishers Supplier">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_school">School Name</label>
                                    <input type="text" class="form-control" name="e_book_school" id="e_book_school" placeholder="School Name">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_chapter">Chapter</label>
                                    <input type="text" class="form-control" name="e_book_chapter" id="e_book_chapter" placeholder="Chapter">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_quantity">Quantity</label>
                                    <input type="number" class="form-control" name="e_book_quantity" id="e_book_quantity" placeholder="Quantity">
                                </div>
                                <div class="form-group">
                                    <label for="e_book_cost">Cost</label>
                                    <input type="number" min="0" class="form-control" name="e_book_cost" id="e_book_cost" step=0.0001 placeholder="Cost Manatda">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="e_book_number">Kitap Nomeri</label>
                                    <input type="text" class="form-control" name="e_book_number" id="e_book_number" placeholder="Kitap Nomeri">
                                </div> -->
                                <div class="form-group">
                                    <label for="e_writed_on_date">Added Date</label>
                                    <input type="date" class="form-control" name="e_writed_on_date" id="e_writed_on_date" placeholder="Added Date">
                                </div>
                                <button type="submit" class="btn btn-primary" name="e_submit" value="submit">Edit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <!-- <button type="button" class="btn btn-success clear_inputs2" style="float: right;">Hemmesini Boşat</button> -->
                            </div>
                        </div>
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

    function disableFormE (cat_no)
    {
        if (cat_no == 1)    $('#e_book_name, #e_book_serialnumber, #e_book_language, #e_student_cat, #e_book_school, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
        if (cat_no == 2)    $('#e_book_subject, #e_book_class, #e_book_school, #e_book_chapter').attr('disabled', 'disabled');
        if (cat_no == 3)    $('#e_book_name, #e_book_serialnumber, #e_book_language, #e_student_cat, #e_book_school, #e_book_edition').attr('disabled', 'disabled');
        if (cat_no == 4)    $('#e_book_language, #e_book_serialnumber, #e_student_cat, #e_book_class, #e_book_school, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
        if (cat_no == 5)    $('#e_book_subject, #e_book_serialnumber, #e_book_class, #e_student_cat, #e_book_school, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
        if (cat_no == 6)    $('#e_book_language, #e_book_serialnumber, #e_student_cat, #e_book_class, #e_book_school, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
        if (cat_no == 7)    $('#e_book_name, #e_book_serialnumber, #e_book_language, #e_student_cat, #e_book_chapter, #e_book_edition').attr('disabled', 'disabled');
    }

    // $('#e_book_name, #e_book_language, #e_student_cat, #e_book_school, #e_book_chapter, #e_book_edition, #e_book_number').attr('disabled', 'disabled');
    
    // $('.clear_inputs2').click (function() {
    //     $(".col-md-6 .form-group input[type=text], input[type=number]").parent('#edit-book').val("");
    //     $(".col-md-6 .form-group option").parent('#edit-book').removeAttr('selected');
    //     $(".col-md-6 .form-group option[value=0]").parent('#edit-book').attr('selected', 'selected');
    // });

    $('#e_book_category').change (function() {
        $('.form-control').each (function() {
            if ($(this).parents('#edit-book').length > 0)    $(this).removeAttr('disabled');
        })

        var cat_no = $(this).children("option:selected").val();
        console.log(cat_no);

        disableFormE (cat_no);
        
    });

</script>


<?php
    if (isset ($_POST['e_submit']))
    {
      $book_id = NULL;
      $cat_id = NULL;
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
    //   $book_number = NULL;
      $book_exist = 'true';
      $writed_on_date = $_POST['e_writed_on_date'];
      
      $query = "UPDATE books SET ";
      $query2 = "SELECT * FROM books WHERE ";
      if (!empty ($_POST['e_book_category']))   {   $cat_id = $_POST['e_book_category'];     $query = $query . "cat_id='$cat_id', ";  $query2 = $query2 . "cat_id='$cat_id' AND ";}
      if (!empty ($_POST['e_book_serialnumber']))    {   $book_serialnumber = $_POST['e_book_serialnumber'];     $query = $query . "book_serialnumber='$book_serialnumber', ";  $query2 = $query2 . "book_serialnumber='$book_serialnumber' AND ";}
      if (!empty ($_POST['e_book_name']))    {   $book_name = $_POST['e_book_name'];     $query = $query . "book_name='$book_name', ";  $query2 = $query2 . "book_name='$book_name' AND ";}
      else $query = $query . "book_name=NULL, ";
      if (!empty ($_POST['e_book_author']))    {   $book_author = $_POST['e_book_author'];     $query = $query . "book_author='$book_author', ";  $query2 = $query2 . "book_author='$book_author' AND ";}
      if (!empty ($_POST['e_book_year']))    {   $book_year = $_POST['e_book_year'];     $query = $query . "book_year='$book_year', ";  $query2 = $query2 . "book_year='$book_year' AND ";}
      if (!empty ($_POST['e_book_language']))    {   $book_language = $_POST['e_book_language'];     $query = $query . "book_language='$book_language', ";  $query2 = $query2 . "book_language='$book_language' AND ";}
      else $query = $query . "book_language=NULL, ";
      if (!empty ($_POST['e_book_subject']))   {   $book_subject = $_POST['e_book_subject'];     $query = $query . "book_subject='$book_subject', ";  $query2 = $query2 . "book_subject='$book_subject' AND ";}
      else $query = $query . "book_subject=NULL, ";
      if (!empty ($_POST['e_book_class']))   {   $book_class = $_POST['e_book_class'];     $query = $query . "book_class='$book_class', ";  $query2 = $query2 . "book_class='$book_class' AND ";}
      else $query = $query . "book_class=NULL, ";
      if (!empty ($_POST['e_student_cat']))    {   $student_cat = $_POST['e_student_cat'];     $query = $query . "student_cat='$student_cat', ";  $query2 = $query2 . "student_cat='$student_cat' AND ";}
      else $query = $query . "student_cat=NULL, ";
      if (!empty ($_POST['e_book_edition']))   {   $book_edition = $_POST['e_book_edition'];     $query = $query . "book_edition='$book_edition', ";  $query2 = $query2 . "book_edition='$book_edition' AND ";}
      else $query = $query . "book_edition=NULL, ";
      if (!empty ($_POST['e_book_school']))    {   $book_school = $_POST['e_book_school'];     $query = $query . "book_school='$book_school', ";  $query2 = $query2 . "book_school='$book_school' AND ";}
      else $query = $query . "book_school=NULL, ";
      if (!empty ($_POST['e_book_chapter']))  {   $book_chapter = $_POST['e_book_chapter'];     $query = $query . "book_chapter='$book_chapter', ";  $query2 = $query2 . "book_chapter='$book_chapter' AND ";}
      else $query = $query . "book_chapter=NULL, ";
      if (!empty ($_POST['e_book_quantity']))    {   $book_quantity = $_POST['e_book_quantity'];     $query = $query . "book_quantity='$book_quantity', ";  } //$query2 = $query2 . "book_quantity='$book_quantity' AND ";
    //   if (!empty ($_POST['e_book_cost']))    {   $book_cost = $_POST['e_book_cost'];     $query = $query . "book_cost='$book_cost', ";  $query2 = $query2 . "CAST(book_cost AS DECIMAL(7,4))=CAST('$book_cost' AS DECIMAL(7,4)) AND ";}
      $book_cost = $_POST['e_book_cost'];     $query = $query . "book_cost='$book_cost', ";  $query2 = $query2 . "CAST(book_cost AS DECIMAL(7,4))=CAST('$book_cost' AS DECIMAL(7,4))";
    //   if (!empty ($_POST['e_book_number']))    {   $book_number = $_POST['e_book_number'];     $query = $query . "book_number='$book_number', ";  $query2 = $query2 . "book_number='$book_number' AND ";}
    //   else $query = $query . "book_number=NULL, ";

      $query = $query . "book_exist='$book_exist', writed_on_date='$writed_on_date' WHERE book_id=" . $_POST['e_book_id'];
      if ($cat_id == '7')  $query2 = $query2 . "book_exist='$book_exist'";
      echo '<script>console.log("' . $query2 . '")</script>'; 
      if (mysqli_num_rows (mysqli_query ($connection, $query2)) == 0  ||  
         (mysqli_num_rows (mysqli_query ($connection, $query2)) == 1  &&  
          mysqli_fetch_assoc (mysqli_query ($connection, $query2))['book_id'] == $_POST['e_book_id'])) {
        mysqli_query($connection, $query);
        header("location: books.php"); 
      }
      else
      {
        $str = "Swal.fire({
          // toast: true,
          icon: 'warning',
          title: 'Don't add the same book!',
        //   title: 'Şol Bir Kitaby Täzeden Goşmaň!',
        //   showConfirmButton: false
        })";
        echo "<script>";
        echo $str;
        echo "</script>";
      }
    }
?>