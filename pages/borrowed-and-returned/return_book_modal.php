<div class="modal fade" id="return_book">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Return Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" class="return-form">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="rborrow_id">ID</label>
                                <input type="number" class="form-control" name="rborrow_id" id="rborrow_id" placeholder="ID" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="return_book_quantity">Quantity of Returned Books</label>
                                <input type="number" class="form-control" name="return_book_quantity" id="return_book_quantity" placeholder="Quantity of Returned Books" min=1 value=1>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="return_date">Returned Date</label>
                            <input type="date" class="form-control" name="return_date" id="return_date" placeholder="Returned Date">
                        </div>
                            <button type="submit" class="btn btn-primary r_submit">Return</button>
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

