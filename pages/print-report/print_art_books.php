<?php

    $sql = "SELECT books.cat_id, books.book_id AS bid, writed_on_books.book_id, writed_off_books.book_id, ";
    $sql .= "books.book_name, books.book_language, books.book_edition, books.book_year, books.book_author, books.book_serialnumber, ";
    $sql .= "books.book_quantity, books.student_cat, writed_on_books.added_quantity AS on_quan, ";
    $sql .= "writed_off_books.added_quantity AS off_quan, books.book_cost, books.writed_on_date as ";
    $sql .= "won_date, writed_on_books.writed_on_date, writed_off_books.writed_off_date, ";
    $sql .= "books.book_exist FROM books LEFT JOIN writed_off_books ON books.book_id=writed_off_books.book_id ";
    $sql .= "LEFT JOIN writed_on_books ON books.book_id=writed_on_books.book_id WHERE (books.cat_id='2' OR books.cat_id='4' OR books.cat_id='5') ";
    $sql .= "ORDER BY books.book_name, books.book_author, books.book_year, ";
    $sql .= "books.book_language, books.student_cat, books.book_edition, ";
    $sql .= "books.book_cost, writed_on_books.book_id, writed_off_books.book_id, ";
    $sql .= "books.writed_on_date ASC";


    $run = mysqli_query ($connection, $sql);
    if (mysqli_num_rows ($run) > 0) {

    unset ($books);
    while ($row = mysqli_fetch_assoc ($run))   $books[] = $row;
    $books[] = $books[sizeof ($books) - 1];
    $books[sizeof ($books) - 1]['book_name'] = 'zaybal';
    $books[sizeof ($books) - 1]['bid'] = '-1';
    // $books[sizeof ($books) - 1]['book_class'] = -1;

    // echo '<tr><td></td>';
    // echo '<td style="text-align: center; font-weight: bold;">' . $books[0]['book_class'] . '</td>';
    // echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
    // echo '<td></td><td></td></tr>';
    

    $on_quan = 0;
    $off_quan = 0;
    // class book writed on quantity, class book writed off cost
    $ab_num = array (0, 0, 0, 0, 0, 0, 0, 0);
    // class summary book writed on quantity, class book writed off cost
    // $csb_num = array (0, 0, 0, 0, 0, 0, 0, 0);
    
    $tb = 1;
    unset ($obooks);
    // echo sizeof ($books) . 'wer';
    for ($i=0; $i<sizeof ($books) - 1; $i++)
    {
        // echo '<pre>';
        // echo $i;
        // print_r ($books[$i]);
        // echo '</pre>';
        if (
            ($books[$i]['book_name'] == $books[$i + 1]['book_name']  &&  
            $books[$i]['book_author'] == $books[$i + 1]['book_author']  &&  
            $books[$i]['book_year'] == $books[$i + 1]['book_year']  &&  
            $books[$i]['book_language'] == $books[$i + 1]['book_language']  && 
            $books[$i]['student_cat'] == $books[$i + 1]['student_cat']  &&  
            $books[$i]['book_edition'] == $books[$i + 1]['book_edition']  &&   
            $books[$i]['book_quantity'] == $books[$i + 1]['book_quantity']  &&  
            $books[$i]['book_cost'] == $books[$i + 1]['book_cost']) ||
            $books[$i]['bid'] == $books[$i + 1]['bid']
        )
        {
            $on_quan += $books[$i]['on_quan'];
            $off_quan += $books[$i]['off_quan'];
            // echo $i . ' ';
        }
        else
        {
            $on_quan += $books[$i]['on_quan'];
            $off_quan += $books[$i]['off_quan'];


            $bqua = ($books[$i]['book_quantity'] - $on_quan + $off_quan);
            $tr = "";
            $obook = 0;
            if ($on_quan != 0 ||  
                substr ($books[$i]['won_date'], 0, strlen ($books[$i]['won_date']) - 3) == $cb_date)
            {
                // $tr .= '<tr style="color:red;">';
                $on_quan += $bqua;
                $obook = 1;
                $bqua = 0;
            }
            else if ($off_quan != 0)
            {
                // $tr .= '<tr style="color:red;">';
                $obook = 1;
                // $off_quan += $bqua;
                // $bqua = 0;
            }
            
            // $tr .= '<td>' . $books[$i]['won_date'] . '</td>';
            // echo $i . ' ';
            // if ($obook == 0)    $tr .= '<tr><td style="text-align: center;">' . $books[$i]['bid'] . '</td>';
            if ($obook == 0)    $tr .= '<tr><td style="text-align: center;">' . $tb . '</td>';
            $tr .= '<td>' . $books[$i]['book_author'] . ' "' . $books[$i]['book_name'] . '"';
            if ($books[$i]['cat_id'] == '2')   $tr .= ' (' . $books[$i]['book_language'] . ')</td>';
            else if ($books[$i]['cat_id'] == '4')   $tr .= ' (Gollanma)</td>';
            $tr .= '<td style="text-align: center;">' . $books[$i]['book_year'] . '</td>';
            $tr .= '<td class="td-num">';
                if ($bqua != 0) $tr .= $bqua; 
            $tr .= '</td><td class="td-num">';
            if ($bqua != 0) $tr .= floor ($bqua * $books[$i]['book_cost'] * 100) / 100;
            $tr .= '</td>';
            $tr .= '<td class="td-num">';
                if ($on_quan != 0) $tr .= $on_quan; 
            $tr .= '</td><td class="td-num">';
                if ($on_quan != 0) $tr .= floor ($on_quan * $books[$i]['book_cost'] * 100) / 100;
            $tr .= '</td>';
            $tr .= '<td class="td-num">';
                if ($off_quan != 0) $tr .= $off_quan; 
            $tr .= '</td><td class="td-num">';
                if ($off_quan != 0) $tr .= floor ($off_quan * $books[$i]['book_cost'] * 100) / 100;
            $tr .= '</td>';
            $tr .= '<td class="td-num">' . $books[$i]['book_quantity'] . '</td><td class="td-num">' . floor (($books[$i]['book_quantity'] * $books[$i]['book_cost']) * 100) / 100 . '</td>';


            $tr .= '</tr>';

            if ($obook == 0)   { echo $tr; $tb ++; }
            else   $obooks[] = $tr;

            $ab_num[0] += $bqua;
            $ab_num[1] += $bqua * $books[$i]['book_cost'];
            $ab_num[2] += $on_quan;
            $ab_num[3] += $on_quan * $books[$i]['book_cost'];
            $ab_num[4] += $off_quan;
            $ab_num[5] += $off_quan * $books[$i]['book_cost'];
            $ab_num[6] += $books[$i]['book_quantity'];
            $ab_num[7] += $books[$i]['book_quantity'] * $books[$i]['book_cost'];
            

            $on_quan = 0;
            $off_quan = 0;
        }

    }

    // ------Print writed-on&off-books-------
    if (!empty ($obooks))
    {

        foreach ($obooks as $bo)
       {
            echo '<tr style="color: red"><td style="text-align: center">' . $tb . '</td>';
            echo $bo;
            
            $tb ++;
        }
    }


    // ----summary----
    // if ($i != sizeof ($books) - 1  &&  $i != 0 && $books[$i]['book_class'] != $books[$i + 1]['book_class'])
    // {
    //     echo '<tr>';
    //     echo '<td></td>';
    //     echo '<td></td>';
    //     echo '<td></td>';
    //     for ($j=0; $j<sizeof ($cb_num); $j++)
    //     {
    //         if ($cb_num[$j] != 0  ||  $j > 6)
    //             echo '<td style="text-align: right; font-weight: bold;">' . $cb_num[$j] . '</td>';
    //         else   echo '<td></td>';
    //         $csb_num[$j] += $cb_num[$j];
    //         $cb_num[$j] = 0;
    //     }
    
    //     if ($books[$i + 1]['book_class'] != -1)
    //     {
    //         echo '</tr>';
    
    //         echo '<tr>';
    //         echo '<td></td>';
    //         echo '<td style="text-align: center; font-weight: bold;">' . $books[$i + 1]['book_class'] . '</td>';
    //         echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
    //         echo '<td></td><td></td>';
    //         echo '</tr>';
    //     }
    
    //     $tb = 0;
    //     // $i --;
    // }
}

?>