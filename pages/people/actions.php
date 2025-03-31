<script>
    $(document).ready (function() {
        $('.remove_people').click(function() {
            // console.log($(this).parent().parent().children(1).html());
            
            var rp = this.parentElement.parentElement;
            var teacher_id = $(this).parent().parent().children().eq(1).html(), student_id = $(this).parent().parent().children().eq(2).html();
            if (teacher_id == '-')    teacher_id = '';
            if (student_id == '-')    student_id = '';

            $.post ('remove_people.php', {
                tid: teacher_id,
                sid: student_id
            }, function (data){
                if (data != '')    Swal.fire (data, '', 'warning');
                else
                {
                    $('#example2').DataTable().row(rp).remove().draw();
                    window.location.href = window.location.href;
                }
            });
            
            // $(this).parent().parent().remove();
        });

        $('.borrow_book').click(function() {

            $('#b_student_class').val($(this).parent().parent().children().eq(4).attr('class_id'));
            
            if ($(this).parent().parent().children().eq(3).html() == 'Teacher')
            {
                $('#borrow_teacher').removeAttr('disabled');
                $('#borrow_student').attr('disabled', true);

                $('#b_people_cat').val(1);
                $('#borrow_teacher').val($(this).parent().parent().children().eq(1).html());
            }
            else
            {
                $('#borrow_student').removeAttr('disabled');
                $('#borrow_teacher').attr('disabled', true);

                $('#b_people_cat').val(0);
                $('#borrow_student').val($(this).parent().parent().children().eq(2).html());
            }

            
            
        //     $.post('left_book.php', {
        //         book_id: $(this).parent().parent().children().eq(0).html()
        //     }, function(data) {
            
            //         $('#left_book').html(data);
            //         $('#b_book_quantity').attr('max', data);
            //         if (data == 0)
            //         {
                //             $('#left_book').parent().removeClass('text-primary');
        //             $('#left_book').parent().addClass('text-danger');
        //             $('#b_submit').attr ('disabled', 'disabled');
        //         }
        //         else
        //         {
            //             $('#left_book').parent().removeClass('text-danger');
            //             $('#left_book').parent().addClass('text-primary');
            //             $('#b_submit').removeAttr ('disabled');
            //         }
            //     });
        });

        // -----------Export Table----------
        $('#table2word').click (function() {$('#example2').tableExport({type: 'word', fileName: 'Teachers and Students'});});
        $('#table2xls').click (function() {$('#example2').tableExport({type: 'excel', fileName: 'Teachers and Students'});});
        $('#table2xlsx').click (function() {
            $('#example2').tableExport({
                type: 'excel',
                mso: {
                    fileFormat: 'xlsx'
                },
                fileName: 'Teachers and Students'
            });
        });
        $('#table2pdf').click (function() {$('#example2').tableExport({type: 'pdf', fileName: 'Teachers and Students'});});
        $('#table2png').click (function() {$('#example2').tableExport({type: 'png', fileName: 'Teachers and Students'});});

    });
</script>
