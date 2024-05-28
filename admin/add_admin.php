<?php 
  include 'db.php';
   session_start();
  if (!isset($_SESSION['userid'])) {
      header("location:index.php");
    }
  include 'header.php';

  $isEdit = isset($_GET['id']);


  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $rec="select * from `user_register` where id=".$id;
    $res=mysqli_query($con,$rec);
    $data=mysqli_fetch_assoc($res);
  }
  if(isset($_POST['submit'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $password=md5($_POST['password']);
      $image=$_FILES['a_image']['name'];
      if($image=="")
      {
        $image=$data['a_image'];
      }else{
        $image=rand(10000,99999).'admin'.$image;
        $path="image/admin/".$image;
        move_uploaded_file($_FILES['a_image']['tmp_name'], $path);
      }
      
      $check_query = "SELECT * FROM `user_register` WHERE email='$email'";
      $res1=mysqli_query($con, $check_query);
      $no = mysqli_num_rows($res1);

    if (isset($_GET['id']))
    {
      $id = $_GET['id'];
      if(mysqli_num_rows($res1)==0)
      {
          $sql = "UPDATE user_register SET name='$name', a_image='$image',email='$email' WHERE id=$id"; 
          mysqli_query($con, $sql);
          if($_SESSION['userid']==$id)
          {
           header("location:logout.php");
          }
          else{
            header("location:view_admin.php"); 
          }
      }else
      {
          $sql = "UPDATE user_register SET name='$name', a_image='$image' WHERE id=$id"; 
          mysqli_query($con, $sql);
          echo "<script>confirm('Email already exists!');</script>";
      }
    } else {
      if(mysqli_num_rows($res1) == 0) {
          $sql = "INSERT INTO user_register (name,email,password,a_image) VALUES ('$name', '$email','$password','$image')";
          mysqli_query($con, $sql);
          header("location:view_admin.php");
      } else {
          echo "<script>alert('Email already exists!');</script>"; 
      }
  }

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
  }
  #password_field {
        display: <?php echo $isEdit ? 'none' : 'block'; ?>;
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
            <h1><?php echo $isEdit ? 'Edit Admin' : 'Add Admin'; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $isEdit ? 'Edit admin' : 'Add admin'; ?></li>
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
                <h3 class="card-title"><?php echo $isEdit ? 'Edit admin' : 'Add admin'; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" enctype="multipart/form-data" id="frm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo  @$data['name'];?>">
                    <span style="display: none; color:red;">Enter Name..!</span>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo  @$data['email'];?>">
                    <span style="display: none; color:red;">Enter Email..!</span>

                  </div>
                  <div class="form-group" id="password_field">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                    <span style="display: none; color:red;">Enter 8 character with  number and special character password...</span>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"  name="a_image" attr_data="<?php echo @$data['image']; ?>">
                        <span class="image_span" style="display: none; color:red; " >Select Image..!</span>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <?php if(isset($data['a_image'])): ?>
                        <div style="width: 90px; height: 90px;  overflow: hidden;">
                           <img src="image/admin/<?php echo $data['a_image']; ?>" alt="Previous Image" style="width: 100%; height: 100%; object-fit: cover;">
                          </div>
                          <input type="hidden" name="previous_image" value="<?php echo $data['a_image']; ?>">
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
<!-- AdminLTE for demo purposes -->

</body>
</html>
<script type="text/javascript">
$('#frm').submit(function(){
    var name = $('#name').val();
    var email = $('#email').val();
    var e_pat = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
    var password = $('#password').val();
    var p_pat = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,8}$/;
    var image = $('#image').val(); 

    
    var isInsert = <?php echo isset($_GET['id']) ? 'false' : 'true'; ?>;

    if(isInsert) { 
        if(name === '') {
            $('#name').next('span').css('display', 'inline'); 
            return false;
        } else {
            $('#name').next('span').css('display', 'none'); 
        }

        if(e_pat.test(email) === false) {
            $('#email').next('span').css('display','inline');
            return false;
        } else {
            $('#email').next('span').css('display', 'none'); 
        }

        if(p_pat.test(password) === false) {
            $('#password').next('span').css('display', 'inline');
            return false;
        } else {
            $('#password').next('span').css('display', 'none');
        } 

        if(image === '') {
            $('#image').next('span').css('display', 'inline');
            return false;
        } else {
            $('#image').next('span').css('display', 'none'); 
        }

        var validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        var fileType = $('#image')[0].files[0].type;
        if ($.inArray(fileType, validImageTypes) === -1) {
            $('#image').next('span').css('display', 'inline');
            return false;
        } else {
            $('#image').next('span').css('display', 'none'); 
        }
    }

    return true;
});
</script>
