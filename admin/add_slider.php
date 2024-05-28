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
    $rec="select * from `slider` where id=".$id;
    $res=mysqli_query($con,$rec);
    $data=mysqli_fetch_assoc($res);
  }
	if(isset($_POST['submit'])){
			$title=$_POST['title'];
			$des=$_POST['des'];
			$image=$_FILES['image']['name'];
		  $path="image/slider/".$image;
		  move_uploaded_file($_FILES['image']['tmp_name'], $path);
      $check_query = "SELECT * FROM `slider` WHERE image='$image'";
      $res1=mysqli_query($con, $check_query);
      if(isset($_GET['id']))
      {
         $id = $_GET['id'];
        if(mysqli_num_rows($res1) == 0)
        {
            $sql="UPDATE `slider` SET title='$title',des='$des',image='$image' where id=".$_GET['id'];
            mysqli_query($con, $sql);
            header("location:view_slider.php"); 
        }else
        {
            $msg="slider Image already exist";

        }
      }else{
        if(mysqli_num_rows($res1) == 0)
        {
             $sql="INSERT INTO `slider`(`title`,`des`,`image`) VALUES ('$title','$des','$image')";
               mysqli_query($con, $sql);
            header("location:view_slider.php"); 
        }else
        {
            $msg="slider image already exist";

        }

      }

			mysqli_query($con,$sql);
	}
 ?>
 <style type="text/css">
    .image_span{
    position: absolute;
    position: relative;
    top:70px;
    left:0px;
    height: 100px;
    width: 300px;
 </style>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add slider</li>
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
                <h3 class="card-title">Add slider</h3>
              </div>
              <!-- /.card-header -->
              <h3 class="card-title" style="margin-left: 10px;color: red;"><?php echo @$msg; ?></h3>
              
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" id="frm">
                <div class="card-body">
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
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"  name="image">
                      <span class="image_span" style="display: none; color:red;">Select Image..!</span>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <?php if(isset($data['image'])): ?>
                        <div style="width: 90px; height: 90px;  overflow: hidden;">
                          <img src="image/admin/<?php echo $data['image']; ?>" alt="Previous Image" style="width: 100%; height: 100%; object-fit: cover;">
                          </div>
                          <input type="hidden" name="previous_image" value="<?php echo $data['image']; ?>">
                        <?php endif; ?>
                    
                    </div>
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
  
    var title=$('#title').val();
    var des=$('#des').val();
    var image=$('#image').val();
    // alert(email);
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
    }   if(image=='') {
        $('#image').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#image').next('span').css('display', 'none'); // Hide error span if valid
    }
    

   

  })
</script>