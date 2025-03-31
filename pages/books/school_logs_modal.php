<?php

    $li = "SELECT * FROM school_logs";
    $lir = mysqli_fetch_assoc (mysqli_query ($connection, $li));

    if (isset ($_POST['log_submit']))
    {
        $sg = $_POST['senior_grade'];
        $sy = $_POST['senior_year'];
        $sc = $_POST['senior_cost'];
        $jg = $_POST['junior_grade'];
        $jy = $_POST['junior_year'];
        $jc = $_POST['junior_cost'];

        if (!empty ($lir))
        {
            $log = "UPDATE school_logs SET junior_grade='$jg', junior_year='$jy', junior_cost='$jc', senior_grade='$sg', senior_year='$sy', senior_cost='$sc'";
            mysqli_query ($connection, $log);
        }
        else
        {
            $log = "INSERT INTO school_logs SET junior_grade='$jg', junior_year='$jy', junior_cost='$jc', senior_grade='$sg', senior_year='$sy', senior_cost='$sc'";
            mysqli_query ($connection, $log);
        }

        header ("location: books.php");
    }


?>



<div class="modal fade" id="add-log">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Class Logs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body"> <div class="row">
                        <div class="col-md-6">
                            <h4>For Elementary Class</h4>
                            <div class="form-group">
                                <label for="junior_grade">Quantity</label>
                                <input type="number" class="form-control" name="junior_grade" id="junior_grade" value="<?php echo $lir['junior_grade']; ?>" placeholder="Quantity">
                            </div>
                            <div class="form-group">
                                <label for="junior_cost">Cost</label>
                                <input type="number" step=0.0001 class="form-control" name="junior_cost" id="junior_cost" value="<?php echo $lir['junior_cost']; ?>" min=0 placeholder="Cost">
                            </div>
                            <div class="form-group">
                                <label for="junior_year">Added Year</label>
                                <input type="number" class="form-control" name="junior_year" id="junior_year" value="<?php echo $lir['junior_year']; ?>" placeholder="Added Year">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>For Middle or High Class</h4>
                            <div class="form-group">
                                <label for="senior_grade">Quantity</label>
                                <input type="number" class="form-control" name="senior_grade" id="senior_grade" value="<?php echo $lir['senior_grade']; ?>" placeholder="Quantity" min=1>
                            </div>
                            <div class="form-group">
                                <label for="senior_cost">Cost</label>
                                <input type="number" step=0.0001 class="form-control" name="senior_cost" id="senior_cost" value="<?php echo $lir['senior_cost']; ?>" min=0 placeholder="Cost">
                            </div>
                            <div class="form-group">
                                <label for="senior_year">Added Year</label>
                                <input type="number" class="form-control" name="senior_year" id="senior_year" value="<?php echo $lir['senior_year']; ?>" placeholder="Added Year" min=1>
                            </div>
                            <button type="submit" class="btn btn-primary" name="log_submit">Add</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div> </div>

                            
                    </div>
                    <!-- /.card-body -->
                    
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>