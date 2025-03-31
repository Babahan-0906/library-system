<?php
    // Nasenka
    echo '<tr class="summary1"><td></td><td>Nasenka 4%</td><td></td><td></td>';
    
    $nasenka = array ($csb_num[1] / 100 * 4, $csb_num[3] / 100 * 4, $csb_num[5] / 100 * 4, $csb_num[7] / 100 * 4);
    echo '<td class="td-num">';
        if ($nasenka[0] != 0)   echo floor ($nasenka[0] * 100) / 100;
    echo '</td><td class="td-num"></td>';
    echo '<td class="td-num">';
        if ($nasenka[1] != 0)   echo floor ($nasenka[1] * 100) / 100;
    echo '</td><td class="td-num"></td>';
    echo '<td class="td-num">';
        if ($nasenka[2] != 0)   echo floor ($nasenka[2] * 100) / 100;
    echo '</td><td class="td-num"></td>';
    echo '<td class="td-num">';
        if ($nasenka[3] != 0)   echo floor ($nasenka[3] * 100) / 100;
    echo '</td>';

    echo '</tr>';


    // GBUS
    echo '<tr class="summary1"><td></td><td>GBÜS 15%</td><td></td><td></td>';
    
    $gbus = array ($nasenka[0] / 100 * 15, $nasenka[1] / 100 * 15, $nasenka[2] / 100 * 15, $nasenka[3] / 100 * 15);
    echo '<td class="td-num">';
        if ($gbus[0] != 0)   echo floor ($gbus[0] * 100) / 100;
    echo '</td><td class="td-num"></td>';
    echo '<td class="td-num">';
        if ($gbus[1] != 0)   echo floor ($gbus[1] * 100) / 100;
    echo '</td><td class="td-num"></td>';
    echo '<td class="td-num">';
        if ($gbus[2] != 0)   echo floor ($gbus[2] * 100) / 100;
    echo '</td><td class="td-num"></td>';
    echo '<td class="td-num">';
        if ($gbus[3] != 0)   echo floor ($gbus[3] * 100) / 100;
    echo '</td>';

    echo '</tr>';


    // Jemi
    echo '<tr class="summary1"><td></td><td>Jemi:</td><td></td>';
    
    echo '<td class="td-num">';
        if ($csb_num[0] != 0)   echo $csb_num[0];
    echo '</td>';
    echo '<td class="td-num">';
        if ($csb_num[1] + $gbus[0] + $nasenka[0] != 0)
        {
            $csb_num[1] += $gbus[0] + $nasenka[0];
            echo floor ($csb_num[1] * 100) / 100;
        }
    echo '</td>';
    echo '<td class="td-num">';
        if ($csb_num[2] != 0)   echo $csb_num[2];
    echo '</td>';
    echo '<td class="td-num">';
        if ($csb_num[3] + $gbus[1] + $nasenka[1] != 0)
        {
            $csb_num[3] += $gbus[1] + $nasenka[1];
            echo floor ($csb_num[3] * 100) / 100;
        }
    echo '</td>';
    echo '<td class="td-num">';
        if ($csb_num[4] != 0)   echo $csb_num[4];
    echo '</td>';
    echo '<td class="td-num">';
        if ($csb_num[5] + $gbus[2] + $nasenka[2] != 0)
        {
            $csb_num[5] += $gbus[2] + $nasenka[2];
            echo floor ($csb_num[5] * 100) / 100;
        }
    echo '</td>';
    echo '<td class="td-num">';
        if ($csb_num[6] != 0)   echo $csb_num[6];
    echo '</td>';
    echo '<td class="td-num">';
        if ($csb_num[7] + $gbus[3] + $nasenka[3] != 0)
        {
            $csb_num[7] += $gbus[3] + $nasenka[3];
            echo floor ($csb_num[7] * 100) / 100;
        }
    echo '</td>';

    echo '</tr>';

    // Nasenka alynmadyk girdeji
    echo '<tr class="summary1"><td></td>';

    echo '<td style="font-size: 15px" >Nasenka alynmadyk girdeji 2/kömekçi internat 400,87+  4/köm internat 29,85</td>';
    echo '<td></td><td></td>';
    echo '<td class="td-num">430.72</td>';
    echo '<td></td><td></td><td></td><td></td><td></td>';
    echo '<td class="td-num">430.72</td>';

    $csb_num[7] += 430.72;
    $csb_num[1] += 430.72;

    echo '</tr>';


    //HEMMESI

    echo '<tr class="summary1">';
    echo '<td></td>';
    echo '<td>HEMMESI</td>';
    echo '<td></td>';
    for ($j=0; $j<sizeof ($csb_num); $j++)
    {
        if ($csb_num[$j] != 0  ||  $j > 6)
            echo '<td style="text-align: right; font-weight: bold;">' . floor ($csb_num[$j] * 100) / 100 . '</td>';
        else   echo '<td></td>';
    }
    echo '</tr>';

?>