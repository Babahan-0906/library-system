<!DOCTYPE html>
<html>
<?php include '../head.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Main Sidebar Container -->
  <?php include '../sidebar&navbar.html' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
                <div class="col-sm-3">
                    <h1>Borrowers</h1>
            </div>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-borrower">
                  Add Borrower
            </button>
              <?php include '../modals.php'; ?>
          </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Category</th>
                    <th>Grade ID</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Trident</td>
                    <td>Trident</td>
                    <td>Trident</td>
                    <td>Trident</td>
                    <td>Trident</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit-borrower"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
                </tbody>
              </table>
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
    </div>
</body>
</html>
