<script>

    $(document).ready (function() {
        // ---------------Return Book--------------
        $('.return_b_book').click(function() {

        $('#return_book_quantity').attr ('max', $(this).parent().parent().children('.bquantity').html());
        $('#rborrow_id').val($(this).parent().parent().children().html());

        });

        $('.return-form').submit (function() {
        // alert ('dsd');
        $.post ("return_book.php", {
            borrow_id: $('#rborrow_id').val(),
            book_quantity: $('#return_book_quantity').val(),
            borrowed_book_quantity: $('#return_book_quantity').attr ('max'),
            return_date: $('#return_date').val()
        }, function (data) {
            console.log(data);
            window.location.href = 'borrowed&returned.php';
        });

        });

        $('.edit_b_book').click (function() {
        // console.log('imhere');
            $('#eborrow_id').val ($(this).parent().parent().children(':eq(0)').html());
            $.post ('get_edit_borrow_book.php', {
                book_id: $(this).parent().parent().children(':eq(0)').html(),
                people_cat: $(this).parent().parent().children(':eq(3)').html()
            }, function (data){
                $('.ed_bb').html(data);
                console.log(data);
            });
                

        });

        $('.remove_b_book').click (function() {

        var borrow_idd = $(this).parent().parent().children().html();
        var a = this.parentElement.parentElement;

        Swal.fire({  
            title: 'Do you want to delete borrowed book?',
            text: 'This book will be accepted as lost book and will be deleted from library!',
            // text: 'Eger öçürseňiz kitap ýiten hökmünde gider we kitaphanadan öçüriler!',
            icon: 'warning',
            // showDenyButton: true,
            showCancelButton: true,  
            confirmButtonText: `Öçür`,  
            cancelButtonText: `Ýatyr`,
        }).then((result) => {  

            if (result.value == true) {

                $.post("remove_borrowed_book.php", {
                    borrow_id: borrow_idd
                }, function(data){
                    console.log(data);
                });
            
                Swal.fire('Borrowed Book Has Been Deleted!', '', 'success');
                $('#example3').DataTable().row(a).remove().draw();

                window.location.href = window.location.href;

            } 
        });
        })

        // -----------Export Table for borrowed_books----------
        $('#table2word').click (function() {$('#example3').tableExport({type: 'word', fileName: 'Borrowed Books'});});
        $('#table2xls').click (function() {$('#example3').tableExport({type: 'excel', fileName: 'Borrowed Books'});});
        $('#table2xlsx').click (function() {
        $('#example3').tableExport({
            type: 'excel',
            mso: {
                fileFormat: 'xlsx'
            },
            fileName: 'Borrowed Books'
        });
        });
        $('#table2pdf').click (function() {$('#example3').tableExport({type: 'pdf', fileName: 'Borrowed Books'});});
        $('#table2png').click (function() {$('#example3').tableExport({type: 'png', fileName: 'Borrowed Books'});});


        // -----------Export Table for returned_books----------
        $('#r_table2word').click (function() {$('#example5').tableExport({type: 'word', fileName: 'Returned Books'});});
        $('#r_table2xls').click (function() {$('#example5').tableExport({type: 'excel', fileName: 'Returned Books'});});
        $('#r_table2xlsx').click (function() {
        console.log('im here');
        $('#example5').tableExport({
            type: 'excel',
            mso: {
                fileFormat: 'xlsx'
            },
            fileName: 'Returned Books'
        });
        });
        $('#r_table2pdf').click (function() {$('#example5').tableExport({type: 'pdf', fileName: 'Returned Books'});});
        $('#r_table2png').click (function() {$('#example5').tableExport({type: 'png', fileName: 'Returned Books'});});
    });

</script>