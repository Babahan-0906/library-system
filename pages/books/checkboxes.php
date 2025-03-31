<div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked disabled> ID </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Subject </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Category </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Serial Number </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Book Title </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Author </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Published Year </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Language </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Grade </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Student Category </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Publishers Supplier </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> School Name </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Chapter </label>
    </div>
    <!-- <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Nomeri </label>
    </div> -->
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Quantity </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Cost </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Total Cost </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Added Date </label>
    </div>
    <div class="form-check form-check-inline">
        <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> Actions </label>
    </div>
</div>


<script>

    $('.form-check-input').click (function() {

        console.log($(this).parent().parent().index());

        if ($(this).is(":checked"))
        {
            var a = $(this).parent().parent().index();
            $('#example1').DataTable().columns(a).visible(true);

        }
        else
        {
            var a = $(this).parent().parent().index();

            // $('.borrow_table thead tr th:eq(' + a + ')').hide();
            // $('.borrow_table tbody tr td:eq(' + a + ')').hide();

            $('#example1').DataTable().columns(a).visible(false);

            // $('.borrow_table thead tr th:eq(' + a + ')').click();
        }

    });

</script>