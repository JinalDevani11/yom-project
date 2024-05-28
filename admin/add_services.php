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
    $rec="select * from `services` where id=".$id;
    $res=mysqli_query($con,$rec);
    $data=mysqli_fetch_assoc($res);
  }
  if(isset($_POST['submit'])){
      $icon=$_POST['icon'];
      $title=$_POST['title'];
      $des=$_POST['des'];
       $check_query = "SELECT * FROM `services` WHERE title='$title'";
      $res1=mysqli_query($con, $check_query);
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];
        if(mysqli_num_rows($res1) == 0)
        {
            $sql="UPDATE `services` SET icon='$icon',title='$title',des='$des' where id=".$_GET['id'];
            mysqli_query($con, $sql);
            header("location:view_services.php"); 
        }else
        {
            $msg="Services already exist";
        }
      }else{
        if(mysqli_num_rows($res1)==0)
        {
          $sql="INSERT INTO `services`(`icon`,`title`,`des`) VALUES ('$icon','$title','$des')";
              mysqli_query($con, $sql);
            header("location:view_services.php"); 
        }else
        {
            $msg="Services already exist";

        }

      }

      mysqli_query($con,$sql);
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
            <h1>Add services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add services</li>
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
                <h3 class="card-title">Add services</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <h3 class="card-title" style="margin-left: 10px;color: red;"><?php echo @$msg; ?></h3>

              <form role="form" method="post" enctype="multipart/form-data" id="frm">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Icon</label>
                    <input type="text" class="form-control" id="icon" placeholder="Enter icon" name="icon" value="<?php echo  @$data['icon'];?>">
                    <span style="display: none; color:red;">Enter Icon..!</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo  @$data['title'];?>">
                    <span style="display: none; color:red;">Enter Title..!</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="des" placeholder="description" name="des" value="<?php echo  @$data['des'];?>">
                    <span style="display: none; color:red;">Enter Description..!</span>
                  </div>
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
    
    var icon=$('#icon').val();
    var title=$('#title').val();
    var des=$('#des').val();
    // alert(email);
    if(icon=='') {
        $('#icon').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#icon').next('span').css('display', 'none'); // Hide error span if valid
    }
      if(title=='') {
        $('#title').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#title').next('span').css('display', 'none'); // Hide error span if valid
    }

    if(des=='') {
        $('#des').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#des').next('span').css('display', 'none'); // Hide error span if valid
    }

   

  })
</script>