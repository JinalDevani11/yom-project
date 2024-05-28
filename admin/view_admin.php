<?php
 session_start();
  include 'db.php';
    if (!isset($_SESSION['userid'])) {
      header("location:index.php");
    }
include 'header.php';

// Number of records per page
$val = 5;

// Get current page number
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate starting index for fetching records
$start = ($page - 1) * $val;

// Check if search query is set
$search_query = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $search_query = " WHERE email LIKE '%$search%'";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sel = "SELECT a_image FROM  `user_register` WHERE id=" . $id;
    $res = mysqli_query($con, $sel);
    $data = mysqli_fetch_assoc($res);
    if (file_exists('image/admin/' . $data['a_image']) && $data['a_image'] != "") {
        unlink("image/admin/" . $data['a_image']);
    }
  $sql = "DELETE FROM `user_register` WHERE id =" . $id;
    if(mysqli_query($con, $sql))
    {
        header("location:view_admin.php");
    }
}

?>

<style type="text/css">
    img {
        width: 50px;
        height: 50px;
    }

    table {
        align-items: center;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View Admin</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">View Data with Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Search form -->
                        <form method="GET" action="view_admin.php">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search by Email" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <!-- End of search form -->
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM user_register $search_query LIMIT $start, $val";
                                $res = mysqli_query($con, $sql);
                                while ($data = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['name']; ?></td>
                                        <td><?php echo $data['email']; ?></td>
                                        <td><img src="image/admin/<?php echo $data['a_image'] ?>" alt="Image"></td>
                                        <td><a href="view_admin.php?id=<?php echo $data['id'] ?>">Delete</a>||<a href="add_admin.php?id=<?php echo $data['id'] ?>">Edit</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- Pagination links -->
                <ul class="pagination">
                    <?php
                    $sql_count = "SELECT COUNT(*) AS total FROM user_register $search_query";
                    $result_count = mysqli_query($con, $sql_count);
                    $row_count = mysqli_fetch_assoc($result_count);
                    $total_pages = ceil($row_count['total'] / $val);
                    for ($i = 1;$i <= $total_pages; $i++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="view_admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php } ?>
                </ul>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->

</body>

</html>
