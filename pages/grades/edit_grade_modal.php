<div class="modal fade" id="edit-grade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Class</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="class_id">ID</label>
                                <input type="text" class="form-control" name="e_class_id" id="e_class_id" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="e_class_name">Class Name</label>
                                <input type="text" class="form-control" name="e_class_name" id="e_class_name" placeholder="Class Name">
                            </div>
                        </div>
                            <button type="submit" name="class_submit" class="btn btn-primary">Edit</button>
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

<script>

    $('.edit_grade').click (function() {

        $('#e_class_id').val($(this).parent().parent().children().eq(0).html());
        $('#e_class_name').val($(this).parent().parent().children().eq(1).html());

    });

</script>

<?php

    if (isset ($_POST['class_submit']))
    {
        $class_id = $_POST['e_class_id'];
        $class_name = $_POST['e_class_name'];

        $query = "UPDATE classes SET class_name='$class_name' WHERE class_id='$class_id'";
        mysqli_query ($connection, $query);

        header ("location: grades.php");
    }


?>