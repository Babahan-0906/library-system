<div class="modal fade" id="edit-book">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Writed-On Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="on_id">ID</label>
                                <input type="number" class="form-control" name="on_id" id="on_id" placeholder="ID" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="added_quantity">Writed-On Quantity</label>
                                <input type="number" class="form-control" name="added_quantity" id="added_quantity" placeholder="Added Quantity" min=1>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="writed_on_date">Added Date</label>
                            <input type="date" class="form-control" name="writed_on_date" id="writed_on_date" placeholder="Added Date">
                        </div>
                            <button type="submit" class="btn btn-primary won_submit" name="won_submit">Edit</button>
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

    if (isset ($_POST['won_submit']))
    {
        $on_id = $_POST['on_id'];
        $added_quantity = $_POST['added_quantity'];
        $date = $_POST['writed_on_date'];

        // -----Get old values of writed_book-----
        $sql = "SELECT added_quantity, book_id FROM writed_on_books WHERE on_id='$on_id'";
        $wbook = mysqli_fetch_assoc (mysqli_query ($connection, $sql));

        // -----Update writed_on_books-----
        $sql = "UPDATE writed_on_books SET added_quantity='$added_quantity', writed_on_date='$date' WHERE on_id='$on_id'";
        mysqli_query ($connection, $sql);
        
        
        // -----Update books-----
        
        $sql = "SELECT book_quantity FROM books WHERE book_id='" . $wbook['book_id'] . "'";
        $oldquan = mysqli_fetch_assoc (mysqli_query ($connection, $sql))['book_quantity'];
        $newquan = $oldquan - $wbook['added_quantity'] + $added_quantity;

        $bid = $wbook['book_id'];
        $sql = "UPDATE books SET book_quantity='$newquan' WHERE book_id='$bid'";
        echo '<script>console.log ("books: ' . $sql . '")</script>';
        mysqli_query ($connection, $sql);

        header ("location: books.php");

    }

?>

<!-- --------------------------EDIT-WRITED-OFF-BOOK------------------------------- -->

<div class="modal fade" id="edit-off-book">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Writed-Off Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="off_id">ID</label>
                                <input type="number" class="form-control" name="off_id" id="off_id" placeholder="ID" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="added_off_quantity">Writed-Off Quantity</label>
                                <input type="number" class="form-control" name="added_off_quantity" id="added_off_quantity" placeholder="Writed-Off Quantity" min=1>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="writed_off_date">Writed-Off Date</label>
                            <input type="date" class="form-control" name="writed_off_date" id="writed_off_date" placeholder="Writed-Off Date">
                        </div>
                            <button type="submit" class="btn btn-primary woff_submit" name="woff_submit">Edit</button>
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
    if (isset ($_POST['woff_submit']))
    {
        $on_id = $_POST['off_id'];
        $added_quantity = $_POST['added_off_quantity'];
        $date = $_POST['writed_off_date'];

        // -----Get old values of writed_book-----
        $sql = "SELECT added_quantity, book_id FROM writed_off_books WHERE off_id='$on_id'";
        $wbook = mysqli_fetch_assoc (mysqli_query ($connection, $sql));

        // -----Update writed_on_books-----
        $sql = "UPDATE writed_off_books SET added_quantity='$added_quantity', writed_off_date='$date' WHERE off_id='$on_id'";
        mysqli_query ($connection, $sql);
        
        
        // -----Update books-----
        
        $sql = "SELECT book_quantity FROM books WHERE book_id='" . $wbook['book_id'] . "'";
        $oldquan = mysqli_fetch_assoc (mysqli_query ($connection, $sql))['book_quantity'];
        $newquan = $oldquan + $wbook['added_quantity'] - $added_quantity;

        $bid = $wbook['book_id'];
        $sql = "UPDATE books SET book_quantity='$newquan', book_exist='true' WHERE book_id='$bid'";
        echo '<script>console.log ("books: ' . $sql . '")</script>';
        mysqli_query ($connection, $sql);

        header ("location: books.php");

    }

?>