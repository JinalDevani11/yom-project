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
    $rec="select * from `blog` where id=".$id;
    $res=mysqli_query($con,$rec);
    $data=mysqli_fetch_assoc($res);
  }
  if(isset($_POST['submit']))
  {
      $image=$_FILES['image']['name'];

      if($image=="")
      {
        $image=$data['image'];
      }else{
        $image=rand(10000,99999).'admin'.$image;
        $path="image/read/".$image;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
      }
      $title=$_POST['title'];
      $author=$_SESSION['userid'];
      $d_date=$_POST['d_date'];
      $category=$_POST['category'];
      $des=$_POST['des'];

      
      if(isset($_GET['id']))
      {
        $id=$_GET['id'];
        $sql="UPDATE `blog` SET  image='$image',title='$title',d_date='$d_date',category='$category',des='$des' where id=".$_GET['id'];
        mysqli_query($con, $sql);
        header("location:view_blog.php");
      }else
      {
        $sql="INSERT INTO `blog`(`image`,`title`,`author`,`d_date`,`category`,`des`) VALUES ('$image','$title','$author','$d_date','$category','$des')";
        header("location:view_blog.php");

      mysqli_query($con,$sql);
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
 </style>
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>Add Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Blog</li>
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
                <h3 class="card-title">Add Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <h3 class="card-title" style="margin-left: 10px;color: red;"><?php echo @$msg; ?></h3>
              <form role="form" method="post" enctype="multipart/form-data" id="frm">
                 <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image"  name="image"  attr_data="<?php echo @$data['image']; ?>"> 
                        <span class="image_span" style="display: none; color:red;">Select Image..!</span>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <?php if(isset($data['image'])): ?>
                        <div style="width: 90px; height: 90px;  overflow: hidden;">
                          <img src="image/read/<?php echo $data['image']; ?>" alt="Previous Image" style="width: 100%; height: 100%; object-fit: cover;">
                          </div>
                          <input type="hidden" name="previous_image" value="<?php echo $data['image']; ?>">
                        <?php endif; ?>
                    
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo  @$data['title'];?>">
                    <span style="display: none; color:red;">Enter Title..!</span>
                  </div>
                 
                    <div class="form-group">
                    <label for="exampleInputPassword1">Date</label>
                    <input type="date" class="form-control" id="date" placeholder="date" name="d_date" value="<?php echo  @$data['d_date'];?>" min="<?php echo date('Y-m-d'); ?>">
                    <span style="display: none; color:red;">Enter Date..!</span>
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail2">Category</label>
                  <div class="input-group">
                      <select class="form-control" name="category" id="category">
                          <option value="select">Select category</option>
                          <?php  
                          $cat="select * from category";
                          $c_res=mysqli_query($con,$cat);
                          while($data1 = mysqli_fetch_assoc($c_res)) {
                          ?>
                          <option value="<?php echo $data1['id']; ?>" <?php if(@$data['category']==@$data1['id']){echo "selected";} ?>>
                              <?php echo $data1['cat']; ?>
                          </option>
                          <?php } ?>
                      </select>
                     <span style="display: none; color:red;">Select Category..!</span>

                  </div>
              </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" id="des" placeholder="Description" name="des" value="<?php echo  @$data['des'];?>">
                    <span style="display: none; color:red;">Enter Description..!</span>

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
    var image = $('#image')[0].files[0];
    var title = $('#title').val();
    var des = $('#des').val();
    var category = $('#category').val();
    var date = $('#date').val();

    // Image validation
    if(!image) {
        $('#image').next('span').css('display', 'inline');
        return false;
    } else {
        $('#image').next('span').css('display', 'none'); 
    }

    

    // Title validation
    if(title == '') {
        $('#title').next('span').css('display', 'inline');
        return false;
    } else {
        $('#title').next('span').css('display', 'none'); 
    }

    
    // Date validation
    if(date == '') {
        $('#date').next('span').css('display', 'inline');
        return false;
    } else {
        $('#date').next('span').css('display', 'none'); 
    }// Category validation

    // Category validation
    if(category == 'select') {
        $('#category').next('span').css('display', 'inline');
        return false;
    } else {
        $('#category').next('span').css('display', 'none'); 
    }


    // Description validation
    if(des == '') {
        $('#des').next('span').css('display', 'inline');
        return false;
    } else {
        $('#des').next('span').css('display', 'none'); 
    }

  


    return true
});


</script>