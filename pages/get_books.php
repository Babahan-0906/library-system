<?php
    require_once ('init.php');

    $query = "SELECT * FROM books WHERE ";

    if (isset ($_POST['book_category'])  &&  !empty($_POST['book_category']))   {  $cat_id = $_POST['book_category'];     $query = $query . "cat_id='$cat_id' AND ";  }
    if (isset ($_POST['book_serialnumber'])  &&  !empty($_POST['book_serialnumber']))    {  $book_serialnumber = $_POST['book_serialnumber'];     $query = $query . "book_serialnumber LIKE '" . $book_serialnumber . "%' AND ";  }
    if (isset ($_POST['book_name'])  &&  !empty($_POST['book_name']))    {  $book_name = $_POST['book_name'];     $query = $query . "book_name LIKE '" . $book_name . "%' AND ";  }
    if (isset ($_POST['book_author'])  &&  !empty($_POST['book_author']))    {  $book_author = $_POST['book_author'];     $query = $query . "book_author LIKE '" . $book_author . "%' AND ";  }
    if (isset ($_POST['book_year'])  &&  !empty($_POST['book_year']))    {  $book_year = $_POST['book_year'];     $query = $query . "book_year LIKE '" . $book_year . "%' AND ";  }
    if (isset ($_POST['book_language'])  &&  !empty($_POST['book_language']))    {  $book_language = $_POST['book_language'];     $query = $query . "book_language LIKE '" . $book_language . "%' AND ";  }
    if (isset ($_POST['book_subject'])  &&  !empty($_POST['book_subject']))   {  $book_subject = $_POST['book_subject'];     $query = $query . "book_subject LIKE '" . $book_subject . "%' AND ";  }
    if (isset ($_POST['book_class'])  &&  !empty($_POST['book_class']))   {  $book_class = $_POST['book_class'];     $query = $query . "book_class='$book_class' AND ";  }
    if (isset ($_POST['student_cat'])  &&  !empty($_POST['student_cat']))    {  $student_cat = $_POST['student_cat'];     $query = $query . "student_cat='$student_cat' AND ";  }
    if (isset ($_POST['book_edition'])  &&  !empty($_POST['book_edition']))   {  $book_edition = $_POST['book_edition'];     $query = $query . "book_edition LIKE '" . $book_edition . "%' AND ";  }
    if (isset ($_POST['book_school'])  &&  !empty($_POST['book_school']))    {  $book_school = $_POST['book_school'];     $query = $query . "book_school LIKE '" . $book_school . "%' AND ";  }
    if (isset ($_POST['book_chapter'])  &&  !empty($_POST['book_chapter']))  {  $book_chapter = $_POST['book_chapter'];     $query = $query . "book_chapter LIKE '" . $book_chapter . "%' AND ";  }
    if (isset ($_POST['book_quantity'])  &&  !empty($_POST['book_quantity']))    {  $book_quantity = $_POST['book_quantity'];     $query = $query . "book_quantity LIKE '" . $book_quantity . "%' AND ";  }
    if (isset ($_POST['book_cost'])  &&  !empty($_POST['book_cost']))    {  $book_cost = $_POST['book_cost'];     $query = $query . "book_cost LIKE '" . $book_cost . "%' AND ";  }
    if (isset ($_POST['book_number'])  &&  !empty($_POST['book_number']))    {  $book_number = $_POST['book_number'];     $query = $query . "book_number LIKE '" . $book_number . "%' AND ";  }
    $query .= "book_exist='true'";
    
    // echo "<td>" . $query . "</td>";
    // echo "<td>" . $queryc . "</td>";
    $query_run = mysqli_query ($connection, $query);


    while ($query_row = mysqli_fetch_assoc ($query_run))    $books[] = $query_row;
    rsort ($books);

// print_r($cats);
    if ($_POST['clear_history'] == 1)
    {    
        echo "
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategoriýasy</th>
                    <th>Seriýa Nomeri</th>
                    <th>Ady</th>
                    <th>Awtory</th>
                    <th>Neşir Ýyly</th>
                    <th>Dili</th>
                    <th>Predmedi</th>
                    <th>Synpy</th>
                    <th>Okuwçy Kategoriýasy</th>
                    <th>Kim Tarapyndan Berildi</th>
                    <th>Mekdep Ady</th>
                    <th>Bölümi</th>
                    <th>Nomeri</th>
                    <th>Sany</th>
                    <th>Bahasy</th>
                    <th>Jemi Bahasy</th>
                    <th>Kitabyň Operasiýalary</th>
                </tr>
            </thead>
            <tbody> ";
    }
    if (mysqli_num_rows($query_run) != 0)
    {
        $cats = array ("Okuw Kitap", "Çeper Eser", "Ýazuw Depder", "Mugallym Gollanma", "Prezidentiň Kitaby", "Zambak Kitap", "Başga Mekdepden Alynan Kitap");
        $students = array ("Başlangyç (1-4)", "Orta (5-10)", "Uly (11-12)");
        foreach ($books as $book)
        {
            echo '<tr>';

                echo "<td>" . $book['book_id'] . "</td>";
                echo "<td>" . $cats[ $book['cat_id'] - 1] . "</td>";
                echo "<td>SN: " . $book['book_serialnumber'] . "</td>";
                echo "<td>" . $book['book_name'] . "</td>";
                echo "<td>" . $book['book_author'] . "</td>";
                echo "<td>" . $book['book_year'] . "</td>";
                echo "<td>" . $book['book_language'] . "</td>";
                echo "<td>" . $book['book_subject'] . "</td>";
                echo "<td>";
                    if (!empty($book['book_class']))  echo $book['book_class'] . " <span>synp</span>";
                echo "</td>";
                echo "<td>";
                    if (!empty($book['student_cat']))  echo $students[ $book['student_cat'] - 1 ] . " <span>synp</span>";
                echo "</td>";
                echo "<td>" . $book['book_edition'] . "</td>";
                echo "<td>" . $book['book_school'] . "</td>";
                echo "<td>";
                    if (!empty($book['book_chapter']))    echo $book['book_chapter'] . '<span>-nji(y) bölüm</span>';
                echo "</td>";
                echo "<td>";
                    if (!empty($book['book_number']))    echo '№' . $book['book_number'];
                echo "</td>";
                echo "<td>";
                    if (!empty($book['book_quantity']))  echo $book['book_quantity'] . " <span>sany</span>";
                echo "</td>";
                echo "<td>" . $book['book_cost'] . " <span>manat</span></td>";
                echo "<td>";
                    if (!empty($book['book_quantity'])  &&  !empty($book['book_cost']))  echo $book['book_cost'] * $book['book_quantity'] . " manat";
                echo "</td>";
                echo "<td>" . 
                    '<button type="button" class="btn btn-primary btn-sm borrow_book" data-toggle="modal" data-target="#borrow-book"><i class="fa fa-book"></i></button>' . 
                    '<button type="button" class="btn btn-primary btn-sm edit_book" data-toggle="modal" data-target="#edit-book"><i class="fa fa-edit"></i></button>' . 
                    '<button type="button" class="btn btn-primary btn-sm remove_book"><i class="fa fa-trash"></i></button> </td>';

            echo '</tr>';
        }

        if ($_POST['clear_history'] == 1)    echo "</tbody>";

        require_once 'books/actions.php';
    }
    else    echo "<tr><td valign='top' colspan='18' style='text-align: center;'>Gözleýän Kitabyňyz Tapylmady</td></tr>";
?>