<?php

    // Ceper Eserler
    $tr = '<tr class="summary2"><td></td><td>Çeper eserleri</td><td></td>';
    
        $tr .=  '<td class="td-cen">';
            if ($ab_num[0] != 0)   $tr .=  $ab_num[0];
        $tr .=  '</td>';
        $tr .=  '<td class="td-cen">';
            if ($ab_num[1] != 0)   $tr .=  floor ($ab_num[1] * 100) / 100;
        $tr .=  '</td>';
        $tr .=  '<td class="td-cen">';
            if ($ab_num[2] != 0)   $tr .=  $ab_num[2];
        $tr .=  '</td>';
        $tr .=  '<td class="td-cen">';
            if ($ab_num[3] != 0)   $tr .=  floor ($ab_num[3] * 100) / 100;
        $tr .=  '</td>';
        $tr .=  '<td class="td-cen">';
            if ($ab_num[4] != 0)   $tr .=  $ab_num[4];
        $tr .=  '</td>';
        $tr .=  '<td class="td-cen">';
            if ($ab_num[5] != 0)   $tr .=  floor ($ab_num[5] * 100) / 100;
        $tr .=  '</td>';
        $tr .=  '<td class="td-cen">';
            if ($ab_num[6] != 0)   $tr .=  $ab_num[6];
        $tr .=  '</td>';
        $tr .=  '<td class="td-cen">';
            if ($ab_num[7] != 0)   $tr .=  floor ($ab_num[7] * 100) / 100;
        $tr .=  '</td>';

    $tr .= '</tr>';

    echo $tr;


    // Okuw Kitaplar

    echo '<tr class="summary2">';
    echo '<td></td>';
    echo '<td>Okuw kitaplary</td>';
    echo '<td></td>';
    for ($j=0; $j<sizeof ($csb_num); $j++)
    {
        // if ($sum != 0  ||  $j > 6)
            echo '<td class="td-cen">' . floor ($csb_num[$j] * 100) / 100 . '</td>';
        // else   echo '<td></td>';
    }
    echo '</tr>';

    // Kitaphana Gory

    echo '<tr class="summary2">';
    echo '<td></td>';
    echo '<td>Kitaphana gory</td>';
    echo '<td></td>';
    for ($j=0; $j<sizeof ($csb_num); $j++)
    {
        // if ($sum != 0  ||  $j > 6)
            echo '<td class="td-cen">' . floor (($csb_num[$j] + $ab_num[$j]) * 100) / 100 . '</td>';
        // else   echo '<td></td>';
    }
    echo '</tr>';


    // Kabul edijiler
        // --mudir--
    echo '<tr class="summary2re">';  for ($r=0; $r<11; $r++)  echo '<td>&emsp;</td>';
    echo '</tr>';
    echo '<tr class="summary2re">';
    echo '<td></td>';
    echo '<td> Mekdep müdiri:</td><td colspan="2">A.Ballyýew </td>';
    echo '<td></td><td></td>';
    echo '<td colspan="5">Kabul etdi _______________</td>';
    // echo '<td></td><td></td><td></td><td></td><'; 
    echo '</tr>';
        // --kitaphanacy--
    echo '<tr class="summary2re">';
    echo '<td></td>';
    echo '<td>Kitaphanaçy</td><td colspan="2">J.Jumadurdyýewa</td>';
    echo '<td></td><td></td><td></td><td></td><td></td><td></td><td></td>';
    echo '</tr>';

?>