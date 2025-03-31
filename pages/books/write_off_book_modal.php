<div class="modal fade" id="write-off-book">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Write Off a Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="wf_book_id">ID</label>
                                <input type="number" class="form-control" name="wf_book_id" id="wf_book_id" placeholder="ID" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="added_quantity">Writed Off Quantity</label>
                                <input type="number" class="form-control" name="added_quantity" id="added_quantity" placeholder="Writed Off Quantity" min=1>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="writed_off_date">Writed Off Date</label>
                            <input type="date" class="form-control" name="writed_off_date" id="writed_off_date" placeholder="Writed Off Date">
                        </div>
                            <button type="submit" class="btn btn-primary wof_submit" name="wof_submit">Write Off</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            
                    </div>
                    <!-- /.card-body -->
                    
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php

    if (isset ($_POST['wof_submit']))
    {
        $wbook_id = $_POST['wf_book_id'];
        $added_quantity = $_POST['added_quantity'];
        $date = $_POST['writed_off_date'];

        $qu = "SELECT book_id FROM borrowed_books WHERE book_id='$wbook_id' AND book_quantity>0";
        if (mysqli_num_rows (mysqli_query ($connection, $qu)) > 0 )
        {
            $str = "Swal.fire ({
                icon: 'warning', 
                text: 'This book has been borrowed by student or teacher. You can not delete it!',
                confirmButtonText: 'Ok'
            })";
            echo "<script>";
            echo $str;
            echo "</script>";
        }
        else
        {
            $sqll = "SELECT cat_id, book_quantity FROM books WHERE book_id='$wbook_id'";
            $cbook = mysqli_fetch_assoc (mysqli_query ($connection, $sqll));
            
            $wcat_id = $cbook['cat_id'];
            $old_bquan = $cbook['book_quantity'];
            $new_bquan = $old_bquan - $added_quantity;

            if ($wcat_id == 2)
            {
                $sqll = "UPDATE books SET book_exist='false' WHERE book_id='$wbook_id'";
                mysqli_query ($connection, $sqll);

                // Get info about book
                $sql2 = "SELECT * FROM books WHERE book_id='$wbook_id'";
                $crow = mysqli_fetch_assoc (mysqli_query ($connection, $sql2));

                // Get all similar books number
                $sql2 = "SELECT book_id FROM books WHERE book_name='" . $crow['book_name'] . "' AND book_author='" . $crow['book_author'] . "' AND book_year='" . $crow['book_year'] . "' AND book_language='" . $crow['book_language'] . "' AND student_cat='" . $crow['student_cat'] . "' AND book_edition='" . $crow['book_edition'] . "' AND CAST(book_cost AS DECIMAL(7,4))=CAST('" . $crow['book_cost'] . "' AS DECIMAL(7,4)) AND book_exist='true'";
                $bnum = mysqli_num_rows (mysqli_query ($connection, $sql2));

                // Update it
                $sql2 = "UPDATE books SET book_quantity='$bnum' WHERE book_name='" . $crow['book_name'] . "' AND book_author='" . $crow['book_author'] . "' AND book_year='" . $crow['book_year'] . "' AND book_language='" . $crow['book_language'] . "' AND student_cat='" . $crow['student_cat'] . "' AND book_edition='" . $crow['book_edition'] . "' AND CAST(book_cost AS DECIMAL(7,4))=CAST('" . $crow['book_cost'] . "' AS DECIMAL(7,4))";
                mysqli_query ($connection, $sql2);
                
                // echo '<script>console.log("' . $sql2 . '")</script>';
            }
            else
            {
                if ($new_bquan == 0)
                {
                    $sqll = "UPDATE books SET book_quantity='$new_bquan', book_exist='false' WHERE book_id='$wbook_id'";
                }
                else
                {
                    $sqll = "UPDATE books SET book_quantity='$new_bquan' WHERE book_id='$wbook_id'";
                }
                mysqli_query ($connection, $sqll);
            }

            $sqll = "INSERT INTO writed_off_books SET book_id='$wbook_id', book_quantity='$old_bquan',";
            $sqll .= " added_quantity='$added_quantity', writed_off_date='$date'";

            mysqli_query ($connection, $sqll);

            header ("location: books.php");
        }
    }

?>