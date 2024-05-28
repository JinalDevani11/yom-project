<?php 
session_start();
	include 'db.php';
	include 'header.php';

  if (!isset($_SESSION['change_password'])) {
      header('location:update_password.php');
  }

  if(isset($_POST['submit']))
  {
    $newpass=$_POST['newpass'];
    $conpass=$_POST['conpass'];
    $user_id=$_SESSION['userid'];

    if($newpass=='')
    {
        echo "<script>alert('Enter Password...!');</script>";
    }else if ($conpass=='')
    {
        echo "<script>alert('Enter Confirm  Password...!');</script>";
    }else
    {
      if($newpass==$conpass)
      {
        $updatepass=md5($conpass);
        $sql="UPDATE `user_register` SET `password`='$updatepass' WHERE id= ".$user_id;
        mysqli_query($con,$sql);
        echo "<script>alert('Password updated...!');</script>";
      }else
      {
        echo "<script>alert('New Password and Confirm password is not match...!');</script>";

      }

    }
  }
	
 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change password</li>
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
                <h3 class="card-title">Change password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" id="frm">
                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" class="form-control" placeholder="Enter New password" name="newpass" value="<?php echo @$newpass ?>">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" class="form-control"  placeholder="Enter Confirm password" name="conpass">
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
  <aside class="control-sidebar control-sid ebar-dark">
    <!-- Control sidebar content goes here  -->
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