<?php
    $sql = "SELECT * FROM user WHERE user_id='1'";
    $row = mysqli_fetch_assoc (mysqli_query ($connection, $sql));
    $user_info = [$row['first_name'], $row['last_name'], $row['user_photo']];
?>

<!-- Page Loader -->

  <div id="loader-wrapper">
      <div id="loader"></div>

      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>

  </div>

  
  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="nav-link" style="cursor: pointer" id="backup_library" title="Export all data">
          <i class="fa fa-download"></i>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="card-body box-profile">
                  <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="../../dist/img/<?php echo $user_info[2]; ?>" alt="Profile Picture">
                  </div>
                  <h3 class="profile-username text-center"><?php echo $user_info[0] . ' ' . $user_info[1]; ?>  </h3>
                  <p class="text-muted text-center">Librarian</p>
                  <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                          <div class="col-12">
                              <a href="../login/login.php"><button type="submit" class="btn btn-primary btn-block">Edit Profile</button></a>
                          </div>
                      </li>
                  </ul>
              </div>
              <!-- /.card-body -->
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../books/books.php" class="brand-link">
      <span class="brand-text font-weight-light">Library System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $user_info[0] . ' ' . $user_info[1]; ?>  </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../books/books.php" class="nav-link">
                <i class="nav-icon fa fa-book "></i>
                <p class="text">Books</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="../grades/grades.php" class="nav-link">
                    <i class="nav-icon fa fa-folder"></i>
                  <p class="text">Grades</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="../people/people.php" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                <p class="text">People</p>
            </a>
          </li>
          <!-- <li class="nav-item">
              <a href="../borrowers/borrowers.php" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                  <p class="text">Borrowers</p>
              </a>
          </li> -->
          <li class="nav-item">
              <a href="../writed-on-and-off/books.php" class="nav-link">
                <i class="nav-icon fa fa-chart-line"></i>
                <p class="text">
                    Writed On and Off
                  </p>
              </a>
          </li>
          <li class="nav-item">
              <a href="../borrowed-and-returned/borrowed&returned.php" class="nav-link">
                <i class="nav-icon fa fa-bookmark"></i>
                <p class="text">
                    Borrowed and Returned
                  </p>
              </a>
          </li>
          <li class="nav-item r-bin">
            <a href="../trash/trash.php" class="nav-link">
              <i class="nav-icon fa fa-trash"></i>
                <p class="text text-wrap">
                  Trash
                </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
    function r_bin ()
    {
      var h1 = 130 + $('.nav').children(':eq(0)').height() * 3 + $('.brand-link').height() + $('.user-panel').height() + $('.nav').children(':eq(3)').height() * 2;
      var height = innerHeight - h1;
      $('.r-bin').css ('margin-top', height + 'px');
    }
    r_bin();
    
    $(window).resize (function() {
      r_bin();
    });
    $('.fa-bars').parent().click (function() {
      setTimeout (function() {
        r_bin();
      }, 300);
    })
    // ----------backup js--------
    $('#backup_library').click (function () {
      $.post ('../backup.php', {a: 'a'}, function (data){
        console.log(data);
        // Swal.fire ('Kitaphananyň maglumatlary eksport edildi!', '', 'success');
        Swal.fire ('All data of library has been succesfully exported!', '', 'success');
      });
    });


  </script>

  <?php
    $file_h = dirname (__FILE__) . '/people/People/students.txt';
    $file_th = dirname (__FILE__) . '/people/People/teachers.txt';

    if (file_exists ($file_th))
    {
      $file = fopen ($file_th, 'r+');

      $std = fgets ($file);
      $teach = explode (' ', $std);
      
      $r = "";
      for ($i=3; $i<strlen ($teach[0]); $i++)  $r .= $teach[0][$i];
      $teach[1] = substr ($teach[1], 0, strlen ($teach[1]) - 2);
      $sql = "INSERT INTO teachers SET class_id='0', first_name='$teach[1]', last_name='$r', teacher_exist='true'";
      mysqli_query ($connection, $sql); 
      // echo $r;
      
      while (!feof ($file))
      {
        $std = fgets ($file);
        // echo $std . '<br>';
        $teach = explode (' ', $std);
        if (sizeof ($teach) < 2)    break;
        
        $teach[1] = substr ($teach[1], 0, strlen ($teach[1]) - 2);
        $sql = "INSERT INTO teachers SET class_id='0', first_name='$teach[1]', last_name='$teach[0]', teacher_exist='true'";
        mysqli_query ($connection, $sql); 
      }
      unlink ($file_th);
      fclose ($file);
    }
    // ------------Students from txt-------------
    if (file_exists ($file_h))
    {
      $file = fopen ($file_h, 'r+');
      // fwrite ($file, "\r\n");
      // $d = fgets ($file);
      function studentsFromtxt ($std, $connection)
      {
        $info = explode (chr (9), $std);
        if (sizeof ($info) < 3)    return 0;
        $info[2] = substr ($info[2], 0, strlen ($info[2]) - 2);

        // ------------Get *class*----------
        $sql = "SELECT class_id FROM classes WHERE class_name='$info[1]'";
        $run = mysqli_query ($connection, $sql);
        if (mysqli_num_rows ($run) == 0)
        {
          $date = date('Y');
          $sql = "INSERT INTO classes SET class_name='$info[1]', added_year='$date'";
          mysqli_query ($connection, $sql);
          $sql = "SELECT class_id FROM classes WHERE class_name='$info[1]'";
          $run = mysqli_query ($connection, $sql);
        }
        $cl_id = mysqli_fetch_assoc ($run)['class_id'];
        // echo $cl_id . ' ';

        // ------------Get *teacher*----------
        $teach_info = explode (' ', $info[2]);
        $sql = "SELECT teacher_id FROM teachers WHERE first_name='$teach_info[1]' AND last_name='$teach_info[0]'";
        $teach_id = mysqli_fetch_assoc (mysqli_query ($connection, $sql))['teacher_id'];
        // echo $teach_id . '<br>';
        // ----------Set teacher's class-----------
        $sql = "UPDATE teachers SET class_id='$cl_id' WHERE teacher_id='$teach_id'";
        mysqli_query ($connection, $sql);

        $student_info = explode (' ', $info[0]);
        $sql = "INSERT INTO students SET teacher_id='$teach_id', class_id='$cl_id', first_name='$student_info[1]', last_name='$student_info[0]', student_exist='true'";
        mysqli_query ($connection, $sql);
      }


      $std = fgets ($file);
      $r = "";
      for ($i=3; $i<strlen ($std); $i++)  $r .= $std[$i];
      studentsFromtxt ($r, $connection);

      // echo $r;

      while (!feof ($file))
      {
        $std = fgets ($file);
        studentsFromtxt ($std, $connection);
        
      }
      unlink ($file_h);
      fclose($file);
    }

    $date1 = date ('Y');
    $date2 = date ('m-d');
    echo '<script>console.log("' . $date2 . '")</script>';

    // ---------------Alert to return all books----------------
    $sql = "SELECT * FROM borrowed_books WHERE book_quantity > 0";
    echo '<script>console.log (' .  mysqli_num_rows (mysqli_query ($connection, $sql)) . ');</script>';
    if ($date2 > '05-14'  &&  $date2 < '05-27'  &&  mysqli_num_rows (mysqli_query ($connection, $sql)) > 0)
    {
      $str = "Swal.fire({
        // toast: true,
        position: 'top-end',
        width: 600,
        icon: 'warning',
        title: 'Please *Return* all borrowed books until May 26th!',
        // title: 'Maýyn 26-ysyna çenli hemme tapşyrylmadyk kitaplary alyň!',
        showConfirmButton: false,
        // timer: 4500,
        timer: 10000,
        backdrop: false
      })";
      echo "<script>";
      echo $str;
      echo "</script>";
    }

    // ----------------Delete students who are finishing school---------------
    if ($date2 == '05-26')
    {
      $sql = "SELECT added_year FROM classes";
      $cyear = mysqli_fetch_assoc (mysqli_query ($connection, $sql))['added_year'];

      if ($cyear + 1 == $date1)
      {
        // -----------------Delete Students---------------
        $sql = "DELETE students FROM students INNER JOIN classes ON students.class_id = classes.class_id WHERE classes.class_name LIKE '12%'";
        mysqli_query ($connection, $sql);

        // -----------------Update Teachers---------------
        $sql = "UPDATE teachers INNER JOIN classes ON teachers.class_id = classes.class_id SET classes.class_id=0 WHERE classes.class_name LIKE '12%'";
        mysqli_query ($connection, $sql);

        // -----------------Delete Classes---------------
        $sql2 = "DELETE FROM classes WHERE class_name LIKE '12%'";
        mysqli_query ($connection, $sql2);


        // ----------------Add 1 to classes--------------
        $sql = "SELECT * FROM classes";
        $run = mysqli_query ($connection, $sql);
        unset ($classes);
        while ($row = mysqli_fetch_assoc ($run))    $classes[] = $row;

        foreach ($classes as $class)
        {
          $name = $class['class_name'];
          $num = explode ('-', $name);
          $num[0] = intval ($num[0]) + 1;
          $str = strval ($num[0]) . '-' . strval ($num[1]);

          $sql = "UPDATE classes SET class_name='$str', added_year='$date1' WHERE class_id=" . $class['class_id'];
          mysqli_query ($connection, $sql);
        }
        echo '<script>window.location.href=window.location.href;</script>';
      }
    }


    // ----------------------Delete history of writed-on-and-off-books---------------
    $day = date ('m');

    if ($day == 1)   $day = 12;
    else $day -= 1;

    if (strlen ($day) == 1)  $day = '0' . $day;
    echo '<script>console.log("' . $day . '")</script>';

    $que = "SELECT * FROM writed_on_books WHERE writed_on_date LIKE '%-$day-%'";
    $que2 = "SELECT * FROM writed_off_books WHERE writed_off_date LIKE '%-$day-%'";
    $que3 = "SELECT * FROM books WHERE book_exist='false' AND cat_id!=7 AND writed_on_date LIKE '%-$day-%'";
    if (mysqli_num_rows (mysqli_query ($connection, $que3)) > 0  ||  mysqli_num_rows (mysqli_query ($connection, $que)) > 0  ||  mysqli_num_rows (mysqli_query ($connection, $que2)) > 0)
    {
      $str = "Swal.fire({
        icon: 'warning',
        text: 'Please delete your records of previous month's *writen on&off books* before adding new ones!',
        // text: 'Täze aý başlady. Hasabyňyza kitap goşmazyňyzdan we çykarmazyňyzdan öň, öňki aýyň hasabyndaky maglumatlary öçüriň!',
        showCancelButton: true,  
        confirmButtonText: `Delete`,  
        cancelButtonText: `Delete Later`
      }).then((result) => {
        if (result.value == true)
        {
          $.post ('../remove_onoff_books.php', {
            date: '" . $day . "'
          }, function(data) {
            console.log(data);
            // Swal.fire('Öňki Aýyň Hasabyndaky Maglumatlar Öçürildi!', '', 'success');
            Swal.fire('Previous Month's Records Has Been Deleted!', '', 'success');
            window.location.href = window.location.href;
          });
        }
      })";
      echo "<script>";
      echo $str;
      echo "</script>";
    }


    // ------------------------------------Backup library data once a day--------------------
    $sl = "SELECT today FROM today";
    $today = date ('d');
    $rn = mysqli_query ($connection, $sl);
    if (mysqli_num_rows ($rn) == 0)
    {
      $sl = "INSERT INTO today SET today='$today'";
      mysqli_query ($connection, $sl);
    }
    else if (mysqli_fetch_assoc ($rn)['today'] != $today)
    {
      $sl = "UPDATE today SET today='$today'";
      mysqli_query ($connection, $sl);

      include '../backup.php';

    }


    // $que = "DELETE FROM writed_on_books WHERE writed_on_date LIKE '%-$day-%'";
    // echo '<script>console.log("' . $que . '")</script>';
    // mysqli_query ($connection, $que);

    // $que = "DELETE FROM writed_off_books WHERE writed_off_date LIKE '%-$day-%'";
    // echo '<script>console.log("' . $que . '")</script>';
    // mysqli_query ($connection, $que);



  ?>
    
    