<?php
    $sql = "SELECT books.book_id AS bid, writed_on_books.book_id, writed_off_books.book_id, ";
    $sql .= "books.book_subject, books.book_author, books.book_year, books.book_class, ";
    $sql .= "books.book_quantity, writed_on_books.added_quantity AS on_quan, writed_off_books.added_quantity ";
    $sql .= "AS off_quan, books.book_cost, books.writed_on_date as won_date, writed_on_books.writed_on_date, ";
    $sql .= "writed_off_books.writed_off_date FROM books LEFT JOIN writed_off_books ON ";
    $sql .= "books.book_id=writed_off_books.book_id LEFT JOIN writed_on_books ON ";
    $sql .= "books.book_id=writed_on_books.book_id WHERE books.cat_id='1' ";
    $sql .= "ORDER BY books.book_class + 0, LENGTH(books.book_class), ";
    $sql .= "writed_on_books.book_id, writed_off_books.book_id, books.writed_on_date, ";
    $sql .= "books.book_author, books.book_subject, books.book_year ASC";

    // echo $sql;
    $run = mysqli_query ($connection, $sql);
    if (mysqli_num_rows ($run) > 0) {

    unset ($books);
    while ($row = mysqli_fetch_assoc ($run))   $books[] = $row;
    $books[] = $books[sizeof ($books) - 1];
    $books[sizeof ($books) - 1]['bid'] = -1;
    $books[sizeof ($books) - 1]['book_class'] = -1;

    echo '<tr><td></td>';
    echo '<td style="text-align: center; font-weight: bold;">' . $books[0]['book_class'] . '</td>';
    echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
    echo '<td></td><td></td></tr>';
    

    $on_quan = 0;
    $off_quan = 0;
    // class book writed on quantity, class book writed off cost
    $cb_num = array (0, 0, 0, 0, 0, 0, 0, 0);
    // class summary book writed on quantity, class book writed off cost
    $csb_num = array (0, 0, 0, 0, 0, 0, 0, 0);
    
    $tb = 0;
    for ($i=0; $i<sizeof ($books) - 1; $i++)
    {
        
        if ($books[$i]['bid'] != $books[$i + 1]['bid'])
        {
            $tb ++;
            $on_quan += $books[$i]['on_quan'];
            $off_quan += $books[$i]['off_quan'];


            $bqua = ($books[$i]['book_quantity'] - $on_quan + $off_quan);
            if ($on_quan != 0 ||  
                substr ($books[$i]['won_date'], 0, strlen ($books[$i]['won_date']) - 3) == $cb_date)
            {
                echo '<tr style="color:red;">';
                $on_quan += $bqua;
                $bqua = 0;
            }
            else if ($off_quan != 0)
            {
                echo '<tr style="color:red;">';
                // $off_quan += $bqua;
                // $bqua = 0;
            }
            
            // echo '<td>' . $books[$i]['won_date'] . '</td>';
            // echo '<td>' . $books[$i]['bid'] . '</td>';
            echo '<td style="text-align: center;">' . $tb . '</td>';
            echo '<td>' . $books[$i]['book_subject'] . '</td>';
            echo '<td style="text-align: center;">' . $books[$i]['book_year'] . '</td>';
            echo '<td class="td-num">';
                if ($bqua != 0) echo $bqua; 
            echo '</td><td class="td-num">';
            if ($bqua != 0) echo floor (($bqua * $books[$i]['book_cost']) * 100) / 100;
            echo '</td>';
            echo '<td class="td-num">';
                if ($on_quan != 0) echo $on_quan; 
            echo '</td><td class="td-num">';
                if ($on_quan != 0) echo floor (($on_quan * $books[$i]['book_cost']) * 100) / 100;
            echo '</td>';
            echo '<td class="td-num">';
                if ($off_quan != 0) echo $off_quan; 
            echo '</td><td class="td-num">';
                if ($off_quan != 0) echo floor (($off_quan * $books[$i]['book_cost']) * 100) / 100;
            echo '</td>';
            echo '<td class="td-num">' . $books[$i]['book_quantity'] . '</td><td class="td-num">' . floor (($books[$i]['book_quantity'] * $books[$i]['book_cost']) * 100) / 100 . '</td>';


            echo '</tr>';

            $cb_num[0] += $bqua;
            $cb_num[1] += $bqua * $books[$i]['book_cost'];
            $cb_num[2] += $on_quan;
            $cb_num[3] += $on_quan * $books[$i]['book_cost'];
            $cb_num[4] += $off_quan;
            $cb_num[5] += $off_quan * $books[$i]['book_cost'];
            $cb_num[6] += $books[$i]['book_quantity'];
            $cb_num[7] += $books[$i]['book_quantity'] * $books[$i]['book_cost'];
            

            $on_quan = 0;
            $off_quan = 0;
            
        }
        else
        {
            $on_quan += $books[$i]['on_quan'];
            $off_quan += $books[$i]['off_quan'];
        }

        if ($i != sizeof ($books) - 1  &&  $i != 0 && $books[$i]['book_class'] != $books[$i + 1]['book_class'])
        {
            echo '<tr>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            for ($j=0; $j<sizeof ($cb_num); $j++)
            {
                if ($cb_num[$j] != 0  ||  $j > 6)
                    echo '<td style="text-align: right; font-weight: bold;">' . floor ($cb_num[$j] * 100) / 100 . '</td>';
                else   echo '<td></td>';
                $csb_num[$j] += $cb_num[$j];
                $cb_num[$j] = 0;
            }

            if ($books[$i + 1]['book_class'] != -1)
            {
                echo '</tr>';

                echo '<tr>';
                echo '<td></td>';
                echo '<td style="text-align: center; font-weight: bold;">' . $books[$i + 1]['book_class'] . '</td>';
                echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
                echo '<td></td><td></td>';
                echo '</tr>';
            }

            $tb = 0;
            // $i --;
        }
    }

    }
?>