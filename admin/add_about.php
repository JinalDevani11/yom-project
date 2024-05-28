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
    $rec="select * from `about` where id=".$id;
    $res=mysqli_query($con,$rec);
    $data=mysqli_fetch_assoc($res);
  }
	if(isset($_POST['submit'])){
			$image=$_FILES['image']['name'];
      if($image=="")
        {
          $image=$data['image'];
        }else{
          $image=rand(10000,99999).'about'.$image;
          $path="image/about/".$image;
          move_uploaded_file($_FILES['image']['tmp_name'], $path);
        }
      $name=$_POST['name'];
      $subname=$_POST['subname'];
      $des=$_POST['des'];

      if(isset($_GET['id']))
      {
        $sql="UPDATE `about` SET image='$image',name='$name',subname='$subname',des='$des' where id=".$_GET['id'];
      }else{
      $sql="INSERT INTO `about`(`image`,`name`,`subname`,`des`) VALUES ('$image','$name','$subname','$des')";

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
    /*padding-top: 20px;*/
   }

 </style>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add About</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add About</li>
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
                <h3 class="card-title">Add About</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" id="frm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"  name="image" attr_data="<?php echo @$data['image']; ?>" >
                        <span class="image_span" style="display: none; color:red; " >Select Image..!</span>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <?php if(isset($data['image'])): ?>
                        <div style="width: 90px; height: 90px;  overflow: hidden;">
                          <img src="image/about/<?php echo $data['image']; ?>" alt="Previous Image" style="width: 100%; height: 100%; object-fit: cover;">
                          
                          </div>
                          <input type="hidden" name="previous_image" value="<?php echo $data['image']; ?>">
                        <?php endif; ?>
                    </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">Name</label>
                       <input type="text" class="form-control" id="name" placeholder="Enter name.." name="name" value="<?php echo  @$data['name'];?>">
                       <span style="display: none; color:red; " >Enter Name..!</span>
                    </div>
                         <div class="form-group">
                      <label for="exampleInputPassword1">Subname</label>
                       <input type="text" class="form-control" id="subname" placeholder="Enter Subname" name="subname" value="<?php echo  @$data['subname'];?>">
                       <span style="display: none; color:red; " >Enter Subname.!</span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                       <input type="text" class="form-control" id="des" placeholder="description" name="des" value="<?php echo  @$data['des'];?>">
                       <span style="display: none; color:red; " >Enter Description..!</span>
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
  
    var image = $('#image').attr('attr_data');
    var name=$('#name').val();
    var subname=$('#subname').val();
    var des = $('#des').val(); // Corrected ID to match textarea

    // alert(file);
     if(image=='')
    {
        var image=$('#image').val();
    }else {
       $('#image').next('span').css('display', 'inline'); // Display error span
        return false;
    }else {
        $('#image').next('span').css('display', 'none'); // Hide error span if valid
    }
 
    if(name=='')
    {
      $('#name').next('span').css('display','inline');
      return false;
      // alert('Enter name..!')
    }else{
        $('#name').next('span').css('display', 'none'); // Hide error span if valid
    } 
    if(subname=='')
    {
      $('#subname').next('span').css('display','inline');
      return false;
      // alert('Enter subject..!');
    }else {
        $('#subname').next('span').css('display', 'none'); // Hide error span if valid
    }
    if (des == '') {
        $('#des').next('span').css('display', 'inline'); // Display error span
        return false;
    } else {
        $('#des').next('span').css('display', 'none'); // Hide error span if valid
    } 
   

  })
</script>