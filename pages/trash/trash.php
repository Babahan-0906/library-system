<?php require_once '../init.php'; ?>
<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Main Sidebar Container -->
  <?php include '../sidebar&navbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
                    <h1>Trash</h1>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <div class="card-header">
            <h3>Deleted Books
              <button style="float: right;" type="button" kind="0" class="btn btn-danger btn-sm remove_all_books" title="Delete All">Delete All</button>
              <?php include '../modals.php'; ?>
            </h3>
          </div>
        <div class="card-body">

            <?php include 'book_table.php'; ?>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

        <!-- Default box -->
      <div class="card">
          <div class="card-header">
            <h3>Deleted People
              <button style="float: right;" type="button" kind="1" class="btn btn-danger btn-sm remove_all_people" title="Delete All">Delete All</button>
            </h3>
          </div>
        <div class="card-body">
          <?php include 'people_table.php'; ?>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




  <?php include '../footer&scripts.php'; ?>
  <script>
    $(document).ready(function(){

      $('.remove_all_books, .remove_all_people').click(function() {

        var a = this.getAttribute ('kind');
        console.log(this);
        Swal.fire({  
          title: 'Delete All?',  
          icon: 'warning',
          text: "You won't be able to restore!",
          // showDenyButton: true,
          showCancelButton: true,  
          confirmButtonText: `Delete`,  
          cancelButtonText: `Cancel`,
        }).then((result) => {  
          /* Read more about isConfirmed, isDenied below */  
          if (result.value == true) {

            $.post("remove_all.php", {
              books: a
            }, function(data){
              console.log(data);
            })

            Swal.fire('Deleted!', '', 'success');
            window.location.href = window.location.href;
          } 
        });

      });

    });

  </script>
    </div>
</body>
</html>
