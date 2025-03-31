<div class="modal fade" id="add-book">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Book</h4>
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
                                    <label for="book_category">Book Category</label>
                                    <select class="form-control" name="book_category" id="book_category">
                                        <option value="">Book Category</option>
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
                                    <label for="book_serialnumber">Serial Number</label>
                                    <input type="text" class="form-control" name="book_serialnumber" id="book_serialnumber" min=1 placeholder="Serial Number">
                                </div>
                                <div class="form-group">
                                    <label for="book_name">Book Title</label>
                                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book Title">
                                </div>
                                <div class="form-group">
                                    <label for="book_author">Author</label>
                                    <input type="text" class="form-control" name="book_author" id="book_author" placeholder="Author">
                                </div>
                                <div class="form-group">
                                    <label for="book_year">Published Year</label>
                                    <input type="text" class="form-control" name="book_year" id="book_year" placeholder="Published Year">
                                </div>
                                <div class="form-group">
                                    <label for="book_language">Language</label>
                                    <input type="text" class="form-control" name="book_language" id="book_language" placeholder="Language">
                                </div>
                                <div class="form-group">
                                    <label for="book_subject">Subject</label>
                                    <input type="text" class="form-control" name="book_subject" id="book_subject" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <label for="book_class">Grade</label>
                                    <select class="form-control" name="book_class" id="book_class">
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
                                    <label for="student_cat">Student Category</label>
                                    <select class="form-control" name="student_cat" id="student_cat" required>
                                        <option value="">Student Category</option>
                                        <option value="1">Elementary (1-4)</option>
                                        <option value="2">Middle (5-10)</option>
                                        <option value="3">High (11-12)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="book_edition">Publishers Supplier</label>
                                    <input type="text" class="form-control" name="book_edition" id="book_edition" placeholder="Publishers Supplier">
                                </div>
                                <div class="form-group">
                                    <label for="book_school">School Name</label>
                                    <input type="text" class="form-control" name="book_school" id="book_school" placeholder="School Name">
                                </div>
                                <div class="form-group">
                                    <label for="book_chapter">Chapter</label>
                                    <input type="text" class="form-control" name="book_chapter" id="book_chapter" placeholder="Chapter">
                                </div>
                                <div class="form-group">
                                    <label for="book_quantity">Quantity</label>
                                    <input type="number" class="form-control" name="book_quantity" id="book_quantity" placeholder="Quantity">
                                </div>
                                <div class="form-group">
                                    <label for="book_cost">Cost</label>
                                    <input type="number" min="0" class="form-control" name="book_cost" step=0.0001 id="book_cost" placeholder="Cost Manatda">
                                </div>
                                <div class="form-group">
                                    <label for="writed_on_date">Added Date</label>
                                    <input type="date" class="form-control" name="writed_on_date" id="writed_on_date" placeholder="Added Date">
                                </div>
                                <button type="submit" class="btn btn-primary" id="add_book" name="submit" value="submit">Add</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-success clear_inputs" style="float: right;">Clear All</button>
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

    function disableForm(cat_no)
    {
        if (cat_no == 1)    $('#book_name, #book_serialnumber, #book_language, #student_cat, #book_school, #book_chapter, #book_edition').attr('disabled', 'disabled');
        if (cat_no == 2)    $('#book_subject, #book_class, #book_school, #book_chapter').attr('disabled', 'disabled');
        if (cat_no == 3)    $('#book_name, #book_serialnumber, #book_language, #student_cat, #book_school, #book_edition').attr('disabled', 'disabled');
        if (cat_no == 4)    $('#book_language, #book_serialnumber, #student_cat, #book_class, #book_school, #book_chapter, #book_edition').attr('disabled', 'disabled');
        if (cat_no == 5)    $('#book_subject, #book_serialnumber, #book_class, #student_cat, #book_school, #book_chapter, #book_edition').attr('disabled', 'disabled');
        if (cat_no == 6)    $('#book_language, #book_serialnumber, #student_cat, #book_class, #book_school, #book_chapter, #book_edition').attr('disabled', 'disabled');
        if (cat_no == 7)    $('#book_name, #book_serialnumber, #book_language, #student_cat, #book_chapter, #book_edition').attr('disabled', 'disabled');
    }

    // $('#book_name, #book_language, #student_cat, #book_school, #book_chapter, #book_edition, #book_number').attr('disabled', 'disabled');
    
    $('.clear_inputs').click (function() {
        $(".col-md-6 .form-group input[type=text], input[type=number]").val("");
        $(".col-md-6 .form-group option").removeAttr('selected');
        $(".col-md-6 .form-group option[value=0]").attr('selected', 'selected');
    });

    $('#book_category').change (function() {
        // if ($('.form-control').parent('#add-book')) console.log('yes it is');
        // $('.form-control').removeAttr('disabled');
        $('.form-control').each (function() {
            if ($(this).parents('#add-book').length > 0)    $(this).removeAttr('disabled');
        })

        var cat_no = $(this).children("option:selected").val();
        console.log(cat_no);

        disableForm (cat_no);
        
    });

</script>


<?php

    $query = "SELECT * FROM books WHERE book_exist='true' ORDER BY book_id DESC LIMIT 1";
    $query_run = mysqli_query ($connection, $query);
    
    while ($query_row = mysqli_fetch_assoc($query_run))    $books[] = $query_row;

    if (mysqli_num_rows($query_run) > 0)
    {
        foreach ($books as $book)
        {
            echo "<script>";
            echo '$(document).ready(function() {';
                echo "disableForm (" . $book['cat_id'] . ");";
                echo "$('#book_category').val(" . $book['cat_id'] . ");";
                echo "$('#book_serialnumber').val('" . $book['book_serialnumber'] . "');";
                echo "$('#book_name').val('" . $book['book_name'] . "');";
                echo "$('#book_author').val('" . $book['book_author'] . "');";
                echo "$('#book_year').val(" . $book['book_year'] . ");";
                echo "$('#book_language').val('" . $book['book_language'] . "');";
                echo "$('#book_subject').val('" . $book['book_subject'] . "');";
                if (!empty($book['book_class']))   echo "$('#book_class').val('" . $book['book_class'] . "');";
                if (!empty($book['student_cat']))   echo "$('#student_cat option[value=" . $book['student_cat'] . "]').attr('selected', 'selected');";
                echo "$('#book_edition').val('" . $book['book_edition'] . "');";
                echo "$('#book_school').val('" . $book['book_school'] . "');";
                echo "$('#book_chapter').val('" . $book['book_chapter'] . "');";
                echo "$('#book_quantity').val(" . $book['book_quantity'] . ");";
                echo "$('#book_cost').val(" . $book['book_cost'] . ");";
            echo '});';
            echo "</script>";
        }
    }

?>
