<?php require_once('../init.php'); ?>
<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container 16.06.2022-->
  <?php include '../sidebar&navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
                <div class="">
                    <h1>Kitaplaryň Otçody</h1>
            </div>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <div class="card-header">
            <div class="row" style="display: flex; justify-content: space-between;">
                
                <button type="button" style="width: 15%" class="btn btn-success" id="table2xls">
                    <i class="fa fa-file-excel"></i> Excel(.xls)
                </button>
                <button type="button" style="width: 15%" class="btn btn-primary" id="table2word">
                    <i class="fa fa-file-word"></i> Word
                </button>
                <button type="button" style="width: 15%" class="btn btn-warning" id="table2pdf">
                    <i class="fa fa-file-pdf"></i> Pdf
                </button>
                <button type="button" style="width: 15%" class="btn btn-success" id="table2xlsx">
                    <i class="fa fa-file-excel"></i> Excel(.xlsx)
                </button>
                <button type="button" style="width: 15%" class="btn btn-danger" id="table2png">
                    <i class="fa fa-image"></i> Png
                </button>

            </div>
        </div>
        <div class="card-body" style="margin: 0 auto">

            <?php

                $tdate = date ('Y-m');
                $sql = "SELECT book_id FROM books WHERE writed_on_date LIKE '%$tdate%' LIMIT 1";
                $sql2 = "SELECT book_id FROM writed_on_books WHERE writed_on_date LIKE '%$tdate%' LIMIT 1";
                $sql3 = "SELECT book_id FROM writed_off_books WHERE writed_off_date LIKE '%$tdate%' LIMIT 1";
                
                $year = date ('Y');
                $lt = 0; //lt = log_time
                if (date ('m') == '05'  &&  24 <= date ('d')  &&  date ('d') <= 31)   $lt = 1;
                if (mysqli_num_rows (mysqli_query ($connection, $sql)) == 0 && 
                    mysqli_num_rows (mysqli_query ($connection, $sql2)) == 0 &&  
                    mysqli_num_rows (mysqli_query ($connection, $sql3)) == 0 && $lt == 0)
                {
                    $tdate = date ('01.m.Y', strtotime ('-1 month'));
                    $ndate = date ('01.m.Y');
                    $cb_date = date ('Y-m', strtotime ('-1 month'));

                    $m = date ('m', strtotime ('-1 month'));
                    if ($m == 12)   $year = date ('Y') - 1;
                }
                else
                {
                    $tdate = date ('01.m.Y');
                    $ndate = date ('01.m.Y', strtotime ('+1 month'));
                    $cb_date = date ('Y-m');

                    $m = date ('m');
                }

                

                if ($m == '1')  $month = "Ýanwar";
                if ($m == '2')  $month = "Fewral";
                if ($m == '3')  $month = "Mart";
                if ($m == '4')  $month = "Aprel";
                if ($m == '5')  $month = "Maý";
                if ($m == '6')  $month = "Iýun";
                if ($m == '7')  $month = "Iýul";
                if ($m == '8')  $month = "Awgust";
                if ($m == '9')  $month = "Sentýabr";
                if ($m == '10')  $month = "Oktýabr";
                if ($m == '11')  $month = "Noýabr";
                if ($m == '12')  $month = "Dekabr";

            ?>
            <!-- nowrap and table table-striped classes to class -->
            <table id="example11" class='display table-bordered'>
                <!-- <caption style="caption-side: top; text-align: center"> 
                    Türkmenabat şäheriniň ýöriteleşdirilen 41-nji orta mekdebiniň kitaphana gorunyň <?php echo $year; ?>-nji ýylyň <?php echo $month; ?> aýynyň girdeji we çykdajy hasabaty
                </caption> -->

                <thead>
                    <tr>
                        <th style="font-size: 18px" colspan='11'>
                            Türkmenabat şäheriniň ýöriteleşdirilen 41-nji orta mekdebiniň kitaphana gorunyň <?php echo $year; ?>-nji ýylyň <?php echo $month; ?> aýynyň girdeji we çykdajy hasabaty
                        </th>
                    </tr>

                    <tr>
                        <th rowspan='3' style="width: 40.8px;">T/B</th>
                        <th rowspan='3' style="width: 380px;">Kitabyň ady</th>
                        <th colspan='3' style="width: 195px;"></th>
                        <th colspan='4' style="width: 195px;"><?php echo $month; ?></th>
                        <th colspan='2' style="width: 195px;"></th>
                        
                    </tr>
                    <tr>
                        <th rowspan='2'>Ölçeg birligi</th>
                        <th colspan='2'>Galyndy <?php echo $tdate; ?></th>
                        <th colspan='2'>Girdeji</th>
                        <th colspan='2'>Çykdajy</th>
                        <th colspan='2'>Galyndy <?php echo $ndate; ?> </th>
                        </tr>
                    <tr>
                        <th>sany</th>
                        <th>bahasy</th>
                        <th>sany</th>
                        <th>bahasy</th>
                        <th>sany</th>
                        <th>bahasy</th>
                        <th>sany</th>
                        <th>bahasy</th>
                    </tr>

                </thead>

                <tbody>

                    <?php
                        // echo date ('m');

                        // Print School_books
                            include 'print_school_books.php';
                        // Print children_books
                            include 'print_children_books.php';
                        // Print school_logs
                            include 'print_school_logs.php';
                        // Print print_summary1
                            include 'print_summary1.php';
                        // Print print_art_books
                            include 'print_art_books.php';
                        // Print print_summary2
                            include 'print_summary2.php';
                        
                        ?>

                </tbody>
                <!-- reserve -->
                <!-- last added -->
                <!-- SELECT books.book_id, writed_off_books.book_id, books.book_author, books.book_year, books.book_class, books.book_quantity, books.book_cost FROM books LEFT JOIN writed_off_books ON books.book_id=writed_off_books.book_id LEFT JOIN writed_on_books ON books.book_id=writed_on_books.book_id WHERE books.cat_id='1' AND books.book_exist='true' AND writed_off_books.book_id IS NULL AND writed_on_books.book_id IS NULL ORDER BY books.book_class ASC
                SELECT books.book_id, writed_off_books.book_id, books.book_author, books.book_year, books.book_class, books.book_quantity, books.book_cost FROM books LEFT JOIN writed_off_books ON books.book_id=writed_off_books.book_id LEFT JOIN writed_on_books ON books.book_id=writed_on_books.book_id WHERE books.cat_id='1' AND books.book_exist='true' AND writed_off_books.book_id IS NULL AND writed_on_books.book_id IS NULL AND books.writed_on_date NOT LIKE '%-09-2022%' ORDER BY books.book_class ASC
                SELECT books.book_id, writed_off_books.book_id, books.book_author, books.book_year, books.book_class, books.book_quantity, books.book_cost, books.writed_on_date FROM books LEFT JOIN writed_off_books ON books.book_id=writed_off_books.book_id LEFT JOIN writed_on_books ON books.book_id=writed_on_books.book_id WHERE books.cat_id='1' AND books.book_exist='true' AND writed_off_books.book_id IS NULL AND writed_on_books.book_id IS NULL AND books.writed_on_date NOT LIKE '%2022-09-%' ORDER BY books.book_class ASC
                SELECT books.book_id, writed_on_books.book_id, writed_off_books.book_id, books.book_subject, books.book_author, books.book_year, books.book_class, books.book_quantity, books.book_cost, books.writed_on_date, writed_on_books.writed_on_date, writed_off_books.writed_off_date FROM books LEFT JOIN writed_off_books ON books.book_id=writed_off_books.book_id LEFT JOIN writed_on_books ON books.book_id=writed_on_books.book_id WHERE books.cat_id='1' AND books.book_exist='true' ORDER BY CAST(books.book_class as unsigned), writed_on_books.book_id, writed_off_books.book_id, books.writed_on_date ASC -->
        

            </table>

        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../footer&scripts.php';?>
</div>

<script>
    
    $(document).ready (function () {
        // --------css-------------
        // All
        $('thead th, .td-cen').css ('text-align', 'center');
        $('thead th, .td-cen').css ('vertical-align', 'middle');
        // $('th, td').css ('border', '0.01px solid black');

        // Numbers
        $('td').css ('border-collapse', 'collapse');
        $('.td-num').css ('text-align', 'right');
        $('tr td:first-child').css ('color', 'black');

        // Summary1
        $('.summary1 td').css ('background-color', 'yellow');
        $('.summary1').css ('font-weight', 'bold');

        // Summary2
        $('.summary2 td').css ('background-color', 'rgb(207 207 203)');
        $('.summary2').css ('font-weight', 'bold');
        $('.summary2').css ('color', 'rgb(89 89 89)');

        // Summary2re (gol cekedironlar)
        $('.summary2re td:not(:last-child)').css ('border', 'none');
        $('.summary2re td:last-child').css ('border-top', 'none');
        $('.summary2re').css ('font-weight', 'bold');
        $('.summary2re').css ('color', 'rgb(89 89 89)');
        $('.summary2re').css ('vertical-align', 'bottom');



        // ----------table export------------

        var fname = "Otçot " + new Date().toDateString();
        // var year = new Date().getFullYear();
        $('#table2word').click (function() {$('#example11').tableExport({type: 'word', fileName: fname});});
        $('#table2xls').click (function() {$('#example11').tableExport( {
                type: 'excel',
                mso: {
                    fileFormat: 'xlshtml',
                    pageFormat: 'a4',               // Page format used for page orientation
                    pageOrientation: 'landscape',
                    styles: ["color", "font-weight", "text-align", "vertical-align", "border", "float", "background-color"],
                    worksheetName: fname
                },
                fileName: fname

            });
        });
        $('#table2xlsx').click (function() {
            $('#example11').tableExport({
                type: 'excel',
                mso: {
                    fileFormat: 'xlsx',
                    pageOrientation: 'landscape',
                    worksheetName: fname
                },
                fileName: fname
            });
        });
        $('#table2pdf').click (function() {$('#example11').tableExport({type: 'pdf', fileName: fname});});
        $('#table2png').click (function() {$('#example11').tableExport({type: 'png', fileName: fname});});

    });

</script>


</body>
</html>
