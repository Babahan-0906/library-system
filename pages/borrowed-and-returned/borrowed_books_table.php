<table id="example3" class="table table-striped borrow_table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Borrower's Name</th>
            <th>Grade</th>
            <th>Occupation</th>
            <th>Subect</th>
            <th>Category</th>
            <th>Serial Number</th>
            <th>Book Title</th>
            <th>Author</th>
            <th>Published Year</th>
            <th>Language</th>
            <th>Grade</th>
            <th>Student Category</th>
            <th>Publishers Supplier</th>
            <th>School Name</th>
            <th>Chapter</th>
            <!-- <th>Nomeri</th> -->
            <th>Quantity</th>
            <th>Cost</th>
            <th>Total Cost</th>
            <th>Borrowed Date</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "SELECT * FROM borrowed_books WHERE borrow_exist=1 AND book_quantity > 0";
        $query_run = mysqli_query ($connection, $query);

        unset ($borrowers);
        while ($query_row = mysqli_fetch_assoc ($query_run))    $borrowers[] = $query_row;

        // $cats = array ("Okuw Kitap", "Çeper Eser", "Ýazuw Depder", "Mugallym Gollanma", "Prezidentiň Kitaby", "Zambak Kitap", "Başga Mekdepden Alynan Kitap");
        $cats = array ("Schoolbook", "Literary Book", "Primaries Copybook", "Teachers Guide", "President Book", "Zambak Book", "Borrowed from Other Schools");
        $student_cat = array ("Elementary (1-4)", "Middle (5-10)", "High (11-12)");
        foreach ($borrowers as $borrower)
        {

            echo '<tr>';
            
            echo '<td>' . $borrower['borrow_id'] . '</td>';

            
            // --------------Get People Name--------------

            $sql = "SELECT class_id, first_name, last_name FROM ";
            $p = 0;
            if (!empty ($borrower['student_id']))    $sql .= "students WHERE student_exist='true' AND student_id=" . $borrower['student_id'];
            if (!empty ($borrower['teacher_id']))    { $sql .= "teachers WHERE teacher_exist='true' AND teacher_id=" . $borrower['teacher_id']; $p = 1; }
            
            $sql_row = mysqli_fetch_assoc (mysqli_query ($connection, $sql));
            echo '<td>' . $sql_row['first_name'] . ' ' . $sql_row['last_name'] . '</td>';


            // -------------Get People Class-------------

            $query = "SELECT class_name FROM classes WHERE class_id=" . $sql_row['class_id'];
            echo '<td>' . mysqli_fetch_assoc (mysqli_query ($connection, $query))['class_name'] . '</td>';
            

            // -------------------People-Cat-----------------

            echo '<td>';
            if ($p == 0)    echo 'Student';
            else    echo 'Teacher';
            echo '</td>';

            // --------------Get-Book---------------------------
            
            // echo '<script>console.log("' . $borrower['book_id'] . '")</script>';
            unset ($book);
            $query = "SELECT * FROM books WHERE book_id=" . $borrower['book_id'] . " AND book_exist='true'";
            $book = mysqli_fetch_assoc (mysqli_query ($connection, $query));
            
            // echo '<script>console.log("' . $book['cat_id'] . ' ' . $book['book_id'] . '");</script>';
            echo "<td>" . $book['book_subject'] . "</td>";
            echo "<td>" . $cats[$book['cat_id'] - 1] . "</td>";
            echo "<td>";
                if (!empty ($book['book_serialnumber'])) echo "SN: " . $book['book_serialnumber'];
            echo "</td>";
            echo "<td>" . $book['book_name'] . "</td>";
            echo "<td>" . $book['book_author'] . "</td>";
            echo "<td>" . $book['book_year'] . "</td>";
            echo "<td>" . $book['book_language'] . "</td>";
            echo "<td>";
                if (!empty($book['book_class']))  echo $book['book_class'];
            echo "</td>";
            echo "<td>";
                if (!empty($book['student_cat']))  echo $student_cat[ $book['student_cat'] - 1 ] . " grade";
            echo "</td>";
            echo "<td>" . $book['book_edition'] . "</td>";
            echo "<td>" . $book['book_school'] . "</td>";
            echo "<td>";
                if (!empty($book['book_chapter']))    echo $book['book_chapter'] . ' chapter';
            echo "</td>";
            // echo "<td>";
            //     if (!empty($book['book_number']))    echo '№' . $book['book_number'];
            // echo "</td>";
            echo '<td class="bquantity">' . $borrower['book_quantity'] . "</td>";
            echo "<td>" . $book['book_cost'] . " manat</td>";
            echo '<td>' . $book['book_cost'] * $borrower['book_quantity'] . " manat" . "</td>";
            echo "<td>" . $borrower['borrow_date'] . '</td>';
            echo '<td>
                    <button type="button" title="Return Book" class="btn btn-primary btn-sm return_b_book" data-toggle="modal" data-target="#return_book">Return</button>
                    <button type="button" title="Edit Book" class="btn btn-primary btn-sm edit_b_book" data-toggle="modal" data-target="#edit-borrow-book">Edit</button>
                    <button type="button" title="Delete Book" class="btn btn-primary btn-sm remove_b_book"><i class="fa fa-trash"></i></button>
                </td></tr>';
                

        }
        ?>
    </tbody>
</table>
