<table id='example7' class='table table-striped search_table' style='font-size:15px'>
    <thead>
    <tr>
        <th>ID</th>
        <th>Deleted Date</th>
        <th>Subject</th>
        <th>Category</th>
        <!-- <th>Seriýa Nomeri</th> -->
        <!-- <th>Ady</th> -->
        <th>Author</th>
        <th>Published Year</th>
        <th>Grade</th>
        <th>School Name</th>
        <!-- <th>Nomeri</th> -->
        <th>Quantity</th>
        <th>Cost</th>
        <th>Total Cost</th>
        <th>Operations</th>
    </tr>
    </thead>
    <tbody>
    <?php

        $query = "SELECT * FROM books WHERE book_exist='false' AND cat_id='7'";
        $query_run = mysqli_query ($connection, $query);

        if (mysqli_num_rows ($query_run) > 0)
        {
            unset ($books);
            while ($query_row = mysqli_fetch_assoc ($query_run))    $books[] = $query_row;

            // $cats = array ("Okuw Kitap", "Çeper Eser", "Ýazuw Depder", "Mugallym Gollanma", "Prezidentiň Kitaby", "Zambak Kitap", "Başga Mekdepden Alynan Kitap");
            $cats = array ("Schoolbook", "Literary Book", "Primaries Copybook", "Teachers Guide", "President Book", "Zambak Book", "Borrowed from Other Schools");
            $students = array ("Elementary (1-4)", "Middle (5-10)", "High (11-12)");
            // $students = array ("Başlangyç (1-4)", "Orta (5-10)", "Uly (11-12)");
            foreach ($books as $book)
            {
                echo '<tr>';

                echo "<td>" . $book['book_id'] . "</td>";
                echo "<td>" . $book['removed_date'] . '</td>';
                echo "<td>" . $book['book_subject'] . "</td>";
                echo "<td>" . $cats[ $book['cat_id'] - 1] . "</td>";
                // echo "<td>SN: " . $book['book_serialnumber'] . "</td>";
                // echo "<td>" . $book['book_name'] . "</td>";
                echo "<td>" . $book['book_author'] . "</td>";
                echo "<td>" . $book['book_year'] . "</td>";
                echo "<td>";
                if (!empty($book['book_class']))  echo $book['book_class'];
                echo "</td>";
                echo "<td>" . $book['book_school'] . "</td>";
                // echo "<td>";
                // if (!empty($ber']))    echo '№' . $book['book_number'];
                // echo "</td>";
                echo "<td>";
                if (!empty($book['book_quantity']))  echo $book['book_quantity'];
                echo "</td>";
                echo "<td>" . $book['book_cost'] . " <span>manat</span></td>";
                echo "<td>";
                if (!empty($book['book_quantity'])  &&  !empty($book['book_cost']))  echo $book['book_cost'] * $book['book_quantity'] . " manat";
                echo "</td>";
                echo "<td>" . 
                    '<button type="button" class="btn btn-primary btn-sm undo_book" title="Restore"><i class="fa fa-undo"></i></button>' . 
                    '<button type="button" class="btn btn-primary btn-sm remove_book" title="Delete"><i class="fa fa-trash"></i></button></td>';
                echo '</tr>';

                // data-toggle="modal" data-target="#borrow-book"
            }
        }

    ?>

    </tbody>
</table>

<script>

    $('.undo_book').click (function() {

        $.post ('undo_book.php', {
            book_id: $(this).parent().parent().children(':eq(0)').html()
        }, function (data) {
            console.log(data);
        })

        $('#example7').DataTable().row(this.parentElement.parentElement).remove().draw();
    })

    $('.remove_book').click (function() {

        $.post ('remove_book.php', {
            book_id: $(this).parent().parent().children(':eq(0)').html()
        }, function (data) {
            console.log(data);
        })

        $('#example7').DataTable().row(this.parentElement.parentElement).remove().draw();
    })

</script>