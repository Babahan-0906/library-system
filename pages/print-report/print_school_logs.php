<?php

    $sql = "SELECT * FROM school_logs";
    $run = mysqli_query ($connection, $sql);
    
    if (mysqli_num_rows ($run) > 0)
    {
        $logs = mysqli_fetch_assoc ($run);

        echo '<tr><td></td>';
        echo '<td style="text-align: center; font-weight: bold;">Synp dergileri</td>';
        echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
        echo '<td></td><td></td></tr>';
        $logs['senior_cost'] = $logs['senior_cost'] * $logs['senior_grade'];
        $logs['junior_cost'] = $logs['junior_cost'] * $logs['junior_grade'];

        // -----if it is september-------
        if ($m == '9')
        {
            // --------senior----------
            echo '<tr style="color: green"><td></td>';
            echo '<td>Synp dergileri (ýokary synplar)</td>';
            echo '<td style="text-align: center;">' . $logs['senior_year'] . '</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="td-num">' . $logs['senior_grade'] . '</td>';
            echo '<td class="td-num">' . floor ($logs['senior_cost'] * 100) / 100 . '</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="td-num">' . $logs['senior_grade'] . '</td>';
            echo '<td class="td-num">' . floor ($logs['senior_cost'] * 100) / 100 . '</td></tr>';
            
            // --------junior----------
            echo '<tr style="color: green"><td></td>';
            echo '<td>Synp dergileri (başlangyç synplar)</td>';
            echo '<td style="text-align: center;">' . $logs['junior_year'] . '</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="td-num">' . $logs['junior_grade'] . '</td>';
            echo '<td class="td-num">' . floor ($logs['junior_cost'] * 100) / 100 . '</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td class="td-num">' . $logs['junior_grade'] . '</td>';
            echo '<td class="td-num">' . floor ($logs['junior_cost'] * 100) / 100 . '</td></tr>';

            $chsb_num[2] += $logs['junior_grade'] + $logs['senior_grade'];
            $chsb_num[3] += $logs['junior_cost'] + $logs['senior_cost'];
            $chsb_num[6] += $logs['junior_grade'] + $logs['senior_grade'];
            $chsb_num[7] += $logs['junior_cost'] + $logs['senior_cost'];
        }
        else
        {
            // ---if it is may---
            // --------senior----------
            echo '<tr style="color: green"><td></td>';
            echo '<td>Synp dergileri (ýokary synplar)</td>';
            echo '<td style="text-align: center;">' . $logs['senior_year'] . '</td>';
            echo '<td class="td-num">' . $logs['senior_grade'] . '</td>';
            echo '<td class="td-num">' . floor ($logs['senior_cost'] * 100) / 100 . '</td>';
            $chsb_num[0] += $logs['senior_grade'];
            $chsb_num[1] += $logs['senior_cost'];
            echo '<td></td>';
            echo '<td></td>';
            // ------if it is end of may-------
            if ($m == '05'  &&  24 <= date ('d')  &&  date ('d') <= 31)
            {
                echo '<td class="td-num">' . $logs['senior_grade'] . '</td>';
                $logs['senior_grade'] = 0;
                echo '<td class="td-num">' . floor ($logs['senior_cost'] * 100) / 100 . '</td>';
                $logs['senior_cost'] = 0;
                $chsb_num[4] += $logs['senior_grade'];
                $chsb_num[5] += $logs['senior_cost'];
            }
            else
            {
                echo '<td></td>';
                echo '<td></td>';
            }
            echo '<td class="td-num">' . $logs['senior_grade'] . '</td>';
            echo '<td class="td-num">' . floor ($logs['senior_cost'] * 100) / 100 . '</td></tr>';
            $chsb_num[6] += $logs['senior_grade'];
            $chsb_num[7] += $logs['senior_cost'];
            
            // --------junior----------
            echo '<tr style="color: green"><td></td>';
            echo '<td>Synp dergileri (başlangyç synplar)</td>';
            echo '<td style="text-align: center;">' . $logs['junior_year'] . '</td>';
            echo '<td class="td-num">' . $logs['junior_grade'] . '</td>';
            echo '<td class="td-num">' . floor ($logs['junior_cost'] * 100) / 100 . '</td>';
            $chsb_num[0] += $logs['junior_grade'];
            $chsb_num[1] += $logs['junior_cost'];
            echo '<td></td>';
            echo '<td></td>';
            // ------if it is end of may-------
            if ($m == 5  &&  24 <= date ('d')  &&  date ('d') <= 31)
            {
                echo '<td class="td-num">' . $logs['junior_grade'] . '</td>';
                $logs['junior_grade'] = 0;
                echo '<td class="td-num">' . floor ($logs['junior_cost'] * 100) / 100 . '</td>';
                $logs['junior_cost'] = 0;
                $chsb_num[4] += $logs['junior_grade'];
                $chsb_num[5] += $logs['junior_cost'];
            }
            else
            {
                echo '<td></td>';
                echo '<td></td>';
            }
            echo '<td class="td-num">' . $logs['junior_grade'] . '</td>';
            echo '<td class="td-num">' . floor ($logs['junior_cost'] * 100) / 100 . '</td></tr>';
            $chsb_num[6] += $logs['junior_grade'];
            $chsb_num[7] += $logs['junior_cost'];
        }
    } 

    echo '<tr>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    for ($j=0; $j<sizeof ($chsb_num); $j++)
    {
        if ($chsb_num[$j] != 0  ||  $j > 6)
            echo '<td style="text-align: right; font-weight: bold;">' . floor ($chsb_num[$j] * 100) / 100 . '</td>';
        else   echo '<td></td>';
    }
    echo '</tr>';

    // ------All books sum till this------
    echo '<tr class="summary1">';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    for ($j=0; $j<sizeof ($chsb_num); $j++)
    {
        $sum = $chsb_num[$j] + $csb_num[$j];
        $csb_num[$j] = $sum;
        if ($sum != 0  ||  $j > 6)
            echo '<td style="text-align: right; font-weight: bold;">' . floor ($sum * 100) / 100 . '</td>';
        else   echo '<td></td>';
    }
    echo '</tr>';

?>