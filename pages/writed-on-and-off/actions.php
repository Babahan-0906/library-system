<script>
    $(document).ready (function() {

        $('.remove_book').click(function() {
            // console.log($(this).parent().parent().children(1).html());
            Swal.fire({  
                title: 'Delete Writed-On Book?',
                icon: 'warning',
                text: "Writed-on book will be deleted from library and removed from monthly report!",
                // text: 'Eger öçürseňiz kitap hasaba goşulmadyk ýaly bolar!',
                // showDenyButton: true,
                showCancelButton: true,  
                confirmButtonText: `Delete`,  
                cancelButtonText: `Cancel`,
            }).then((result) => {  

                if (result.value == true) {

                    $.post ('remove_book.php', {
                        book_id: $(this).parent().parent().children().html(),
                        type: 0
                    }, function (data){
                        if (data == '11')
                        {
                            Swal.fire ({
                                icon: 'success', 
                                tiitle: 'Deleted!',
                                text: 'Writed-on book deleted!',
                                showConfirmButton: false
                            });
                            
                            window.location.href = "books.php";
                        }
                        else
                        {
                            Swal.fire("Sorry, book wasn't deleted!", '', 'error');
                        }
                    });
                } 
            });
            
        });


        $('.remove_off_book').click(function() {
            // console.log($(this).parent().parent().children(1).html());
            Swal.fire({  
                title: 'Delete Writed-Off Book?',
                icon: 'warning',
                // text: 'Eger öçürseňiz kitap hasapdan çykmadyk ýaly bolar!',
                text: "Writed-off book will be added to library and removed from monthly report!",
                // showDenyButton: true,
                showCancelButton: true,  
                confirmButtonText: `Delete`,  
                cancelButtonText: `Cancel`,
            }).then((result) => {  

                if (result.value == true) {

                    $.post ('remove_book.php', {
                        book_id: $(this).parent().parent().children().html(),
                        type: 1
                    }, function (data){
                        // console.log(data);
                        if (data == '11'  ||  data == '121')
                        {
                            Swal.fire ({
                                icon: 'success', 
                                tiitle: 'Deleted!',
                                text: 'Writed-off book deleted!',
                                showConfirmButton: false
                            });

                            window.location.href = "books.php";
                        }
                        else
                        {
                            Swal.fire("Sorry, book wasn't deleted!", '', 'error');
                        }
                    });
                } 
            });
            
        });


        $('.borrow_book').click(function() {
            $('#b_book_id').val($(this).parent().parent().children().eq(0).html());

            $.post('left_book.php', {
                book_id: $(this).parent().parent().children().eq(0).html()
            }, function(data) {
                
                $('#left_book').html(data);
                $('#b_book_quantity').attr('max', data);
                if (data <= 0)
                {
                    $('#left_book').parent().removeClass('text-primary');
                    $('#left_book').parent().addClass('text-danger');
                    $('#b_submit').attr ('disabled', 'disabled');
                }
                else
                {
                    $('#left_book').parent().removeClass('text-danger');
                    $('#left_book').parent().addClass('text-primary');
                    // $('#b_submit').removeAttr ('disabled');
                }
            });
        });

        $('.edit_book').click (function() {

            $('#on_id').val($(this).parent().parent().children().html());
            
        });

        $('.edit_off_book').click (function() {

            $('#off_id').val($(this).parent().parent().children().html());

        });

        // -----------Export Table----------
        $('#table2word').click (function() {$('#example9').tableExport({type: 'word', fileName: 'Writed-On Books'});});
        $('#table2xls').click (function() {$('#example9').tableExport({type: 'excel', fileName: 'Writed-On Books'});});
        $('#table2xlsx').click (function() {
            $('#example9').tableExport({
                type: 'excel',
                mso: {
                    fileFormat: 'xlsx'
                },
                fileName: 'Writed-On Books'
            });
        });
        $('#table2pdf').click (function() {$('#example9').tableExport({type: 'pdf', fileName: 'Writed-On Books'});});
        $('#table2png').click (function() {$('#example9').tableExport({type: 'png', fileName: 'Writed-On Books'});});


        $('#off_table2word').click (function() {$('#example10').tableExport({type: 'word', fileName: 'Writed-Off Books'});});
        $('#off_table2xls').click (function() {$('#example10').tableExport({type: 'excel', fileName: 'Writed-Off Books'});});
        $('#off_table2xlsx').click (function() {
            $('#example10').tableExport({
                type: 'excel',
                mso: {
                    fileFormat: 'xlsx'
                },
                fileName: 'Writed-Off Books'
            });
        });
        $('#off_table2pdf').click (function() {$('#example10').tableExport({type: 'pdf', fileName: 'Writed-Off Books'});});
        $('#off_table2png').click (function() {$('#example10').tableExport({type: 'png', fileName: 'Writed-Off Books'});});

    });
</script>