<div class="modal fade" id="add-book">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kitap Goş</h4>
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
                                    <label for="book_category">Kitap Kategoriýasy</label>
                                    <select class="form-control" name="book_category" id="book_category">
                                        <option value="0">Kitap Kategoriýasy</option>
                                        <option value="1">Okuw Kitap</option>
                                        <option value="2">Çeper Eser</option>
                                        <option value="3">Ýazuw Depder</option>
                                        <option value="4">Mugallym Gollanma</option>
                                        <option value="5">Prezidentiň Kitaby</option>
                                        <option value="6">Zambak Kitap</option>
                                        <option value="7">Başga Mekdepden Alynan Kitap</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="book_serialnumber">Seriýa Nomeri</label>
                                    <input type="text" class="form-control" name="book_serialnumber" id="book_serialnumber" min=1 placeholder="Seriýa Nomeri">
                                </div>
                                <div class="form-group">
                                    <label for="book_name">Kitap Ady</label>
                                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Kitap Ady">
                                </div>
                                <div class="form-group">
                                    <label for="book_author">Kitap Awtory</label>
                                    <input type="text" class="form-control" name="book_author" id="book_author" placeholder="Kitap Awtory">
                                </div>
                                <div class="form-group">
                                    <label for="book_year">Kitap Neşir Ýyly</label>
                                    <input type="text" class="form-control" name="book_year" id="book_year" placeholder="Kitap Neşir Ýyly">
                                </div>
                                <div class="form-group">
                                    <label for="book_language">Kitap Dili</label>
                                    <input type="text" class="form-control" name="book_language" id="book_language" placeholder="Kitap Dili">
                                </div>
                                <div class="form-group">
                                    <label for="book_subject">Haýsy Predmet</label>
                                    <input type="text" class="form-control" name="book_subject" id="book_subject" placeholder="Haýsy Predmet">
                                </div>
                                <div class="form-group">
                                    <label for="book_class">Synpy</label>
                                    <select class="form-control" name="book_class" id="book_class">
                                        <option>Synpy</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="student_cat">Okuwçynyň kategoriýasy</label>
                                    <select class="form-control" name="student_cat" id="student_cat" required>
                                        <option value="0">Okuwçynyň kategoriýasy</option>
                                        <option value="1">Başlangyç (1-4)</option>
                                        <option value="2">Orta (5-10)</option>
                                        <option value="3">Uly (11-12)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="book_edition">Kitap Kim Tarapyndan Berildi</label>
                                    <input type="text" class="form-control" name="book_edition" id="book_edition" placeholder="Kitap Kim Tarapyndan Berildi">
                                </div>
                                <div class="form-group">
                                    <label for="book_school">Mekdep Ady</label>
                                    <input type="text" class="form-control" name="book_school" id="book_school" placeholder="Mekdep Ady">
                                </div>
                                <div class="form-group">
                                    <label for="book_chapter">Kitap Bölümi</label>
                                    <input type="text" class="form-control" name="book_chapter" id="book_chapter" placeholder="Kitap Bölümi">
                                </div>
                                <div class="form-group">
                                    <label for="book_quantity">Kitap Sany</label>
                                    <input type="number" class="form-control" name="book_quantity" id="book_quantity" placeholder="Kitap Sany">
                                </div>
                                <div class="form-group">
                                    <label for="book_cost">Kitap Bahasy</label>
                                    <input type="number" min="0" class="form-control" name="book_cost" step=0.0001 id="book_cost" placeholder="Kitap Bahasy Manatda">
                                </div>
                                <!-- <div class="form-group">
                                    <label for="book_number">Kitap Nomeri</label>
                                    <input type="text" class="form-control" name="book_number" id="book_number" placeholder="Kitap Nomeri">
                                </div> -->
                                <div class="form-group">
                                    <label for="writed_on_date">Hasaba Girizilen Senesi</label>
                                    <input type="date" class="form-control" name="writed_on_date" id="writed_on_date" placeholder="Hasaba Girizilen Senesi">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Goş</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Ýatyr</button>
                                <button type="button" class="btn btn-success clear_inputs" style="float: right;">Hemmesini Boşat</button>
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
        if (cat_no == 5)    $('#book_subject, #book_serialnumber, #book_class, #book_language, #student_cat, #book_school, #book_chapter, #book_edition').attr('disabled', 'disabled');
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

    $query = "SELECT * FROM writed_on_books WHERE book_exist='true' ORDER BY book_id DESC LIMIT 1";
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
                if (!empty($book['book_class']))   echo "$('#book_class option[value=" . $book['book_class'] . "]').attr('selected', 'selected');";
                if (!empty($book['student_cat']))   echo "$('#student_cat option[value=" . $book['student_cat'] . "]').attr('selected', 'selected');";
                echo "$('#book_edition').val('" . $book['book_edition'] . "');";
                echo "$('#book_school').val('" . $book['book_school'] . "');";
                echo "$('#book_chapter').val('" . $book['book_chapter'] . "');";
                echo "$('#book_quantity').val(" . $book['book_quantity'] . ");";
                echo "$('#book_cost').val(" . $book['book_cost'] . ");";
                echo "$('#writed_on_date').val('" . $book['writed_on_date'] . "');";
                // echo "$('#book_number').val('" . $book['book_number'] . "');";
            echo '});';
            echo "</script>";
        }
    }

?>
