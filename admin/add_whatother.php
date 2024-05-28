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
    $rec="select * from `whatother` where id=".$id;
    $res=mysqli_query($con,$rec);
    $data=mysqli_fetch_assoc($res);
  }
  if(isset($_POST['submit'])){
      $des=$_POST['des'];
      $name=$_POST['name'];
      $subname=$_POST['subname'];

      if(isset($_GET['id']))
      {
        $sql="UPDATE `whatother` SET des='$des',name='$name',subname='$subname' where id=".$_GET['id'];
      }else{
      $sql="INSERT INTO `whatother`(`des`,`name`,`subname`) VALUES ('$des','$name','$subname')";

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
            <h1>Add What Other Saying</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add What Other Saying</li>
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
                <h3 class="card-title">Add What Other Saying</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" id="frm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" class="form-control" id="des" placeholder="Enter description" name="des" value="<?php echo  @$data['des'];?>">
                    <span style="display: none; color:red;">Enter Description..!</span>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo  @$data['name'];?>">
                    <span style="display: none; color:red;">Enter Name..!</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Subname</label>
                    <input type="text" class="form-control" id="subname" placeholder="subname" name="subname" value="<?php echo  @$data['subname'];?>">
                    <span style="display: none; color:red;">Enter Subname..!</span>
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
  
    
    var des=$('#des').val();
    var name=$('#name').val();
    var subname=$('#subname').val();

    // alert(email);
   
   if(des=='') {
        $('#des').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#des').next('span').css('display', 'none'); // Hide error span if valid
    }  
 
   if(name=='') {
        $('#name').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#name').next('span').css('display', 'none'); // Hide error span if valid
    }  
 
   if(subname=='') {
        $('#subname').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#subname').next('span').css('display', 'none'); // Hide error span if valid
    }  

   

  })
</script>