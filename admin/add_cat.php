<?php 

   session_start();
  include 'db.php';


    if (!isset($_SESSION['userid'])) {
      header("location:index.php");
    }
  include 'header.php';

  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $rec="select * from `category` where id=".$id;
    $res=mysqli_query($con,$rec);
    $data=mysqli_fetch_assoc($res);
  }
  if(isset($_POST['submit'])){
      
      $cat=$_POST['cat'];

      $check_query = "SELECT * FROM `category` WHERE cat='$cat'";
      $res1=mysqli_query($con, $check_query);
    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'];
        if(mysqli_num_rows($res1) == 0)
        {
            $sql = "UPDATE category SET cat='$cat' WHERE id=$id"; 
            mysqli_query($con, $sql);
            header("location:view_cat.php"); 
        }else
        {
           $msg="Category already exist";
       }


} else {
    if(mysqli_num_rows($res1) == 0) {
        $sql = "INSERT INTO category (cat) VALUES ('$cat')";
        mysqli_query($con, $sql);
        header("location:view_cat.php");
    } else {
           $msg="Category already exist";
        
    }
}
  }
 ?>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <h3 class="card-title" style="margin-left: 10px;color: red;"><?php echo @$msg; ?></h3>
              <form role="form" method="post" enctype="multipart/form-data" id="frm" class="m-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input type="text" class="form-control" id="cat" placeholder="Enter Category" name="cat" value="<?php echo  @$data['cat'];?>">
                    <span style="display:none;color:red;">Enter Category..!</span>
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
  

         
           
          

          </div>
         
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
   
  </div>
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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

</body>
</html>
<script type="text/javascript">
  $('#frm').submit(function(){
    
    var cat=$('#cat').val();
   
    // alert(email);
    if(cat=='') {
        $('#cat').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#cat').next('span').css('display', 'none'); // Hide error span if valid
    }
    

   

  })
</script>