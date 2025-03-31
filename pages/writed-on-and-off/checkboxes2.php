<!-- Writed-off-books -->
<div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked disabled> ID </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Subject </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Category </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox"> Serial Number </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Name </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Author </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Published Year </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox"> Language </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox"> Grade </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox"> Student Category </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox"> Publishers Supplier </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox"> School Name </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox"> Chapter </label>
    </div>
    <!-- <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox"> Nomeri </label>
    </div> -->
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Quantity </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Cost </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Total Cost </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Writed-Off Date </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input col-checkbox" checked> Actions </label>
    </div>
</div>


<script>

    $('.col-checkbox').click (function() {

        console.log($(this).parent().parent().index());

        if ($(this).is(":checked"))
        {
            var a = $(this).parent().parent().index();
            $('#example10').DataTable().columns(a).visible(true);

        }
        else
        {
            var a = $(this).parent().parent().index();

            // $('.borrow_table thead tr th:eq(' + a + ')').hide();
            // $('.borrow_table tbody tr td:eq(' + a + ')').hide();

            $('#example10').DataTable().columns(a).visible(false);

            // $('.borrow_table thead tr th:eq(' + a + ')').click();
        }

    });

</script>