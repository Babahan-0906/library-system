<script>
    $(document).ready (function() {

        $('.remove_book').click(function() {
            var ate = this.parentElement.parentElement;
            // console.log($(this).parent().parent().children(1).html());
            
            $.post ('remove_book.php', {
                book_id: $(this).parent().parent().children(1).html()
            }, function (data){
                if (!data)    $('#example1').DataTable().row(ate).remove().draw();
                else
                {
                    Swal.fire ({
                        icon: 'warning', 
                        text: 'This book has been borrowed by teacher or pupil. You can not delete it!',
                        // text: 'Bu kitap mugallyma ýa okuwça berildi, şonuň üçin öçürip bolmaýar!',
                        confirmButtonText: 'Ok'
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

            $.post ('get_edit_book.php', {
                book_id: $(this).parent().parent().children(':eq(' + 0 + ')').html(),
            }, function (data){
                $('.ed_b').html(data);
            });
            
        });
        
        $('.write-off-book').click (function() {

            $('#wf_book_id').val($(this).parent().parent().children().html());

            $('#added_quantity').attr ('max', $(this).attr ('book_quantity'));

        });


        // -----------Export Table----------
        $('#table2word').click (function() {$('#example1').tableExport({type: 'word', fileName: 'Books'});});
        $('#table2xls').click (function() {$('#example1').tableExport( {

                type: 'excel',
                mso: {
                    fileFormat: 'xls',
                    styles: ["color", "background-color"]
                },
                fileName: 'Books'

            });
        });
        $('#table2xlsx').click (function() {
            $('#example1').tableExport({
                type: 'excel',
                mso: {
                    fileFormat: 'xlsx'
                },
                fileName: 'Books'
            });
        });
        $('#table2pdf').click (function() {$('#example1').tableExport({type: 'pdf', fileName: 'Books'});});
        $('#table2png').click (function() {$('#example1').tableExport({type: 'png', fileName: 'Books'});});

    });
</script>